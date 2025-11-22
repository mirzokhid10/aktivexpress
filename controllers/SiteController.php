<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new User();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionSetLanguage($lang)
    {
        if (in_array($lang, ['uz', 'uz_cyrl', 'en', 'ru'])) {
            Yii::$app->language = $lang;
            Yii::$app->session->set('language', $lang);
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


    /**
     * Step 1: Send SMS code to phone
     */
    public function actionLoginPhone()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Debug: log everything about the request
        Yii::info('Request POST: ' . json_encode(Yii::$app->request->post()), __METHOD__);
        Yii::info('Request Headers: ' . json_encode(getallheaders()), __METHOD__);

        if (!Yii::$app->request->isAjax) {
            Yii::warning('Non-AJAX request detected', __METHOD__);
            return ['success' => false, 'message' => 'Invalid request'];
        }

        $phone = Yii::$app->request->post('phone');
        Yii::info('Phone received: ' . $phone, __METHOD__);

        if (!preg_match('/^9989[012345789][0-9]{7}$/', $phone)) {
            Yii::warning('Invalid phone format: ' . $phone, __METHOD__);
            return ['success' => false, 'message' => 'Invalid phone number format'];
        }

        try {
            $response = Yii::$app->httpClient->createRequest()
                ->setMethod('POST')
                ->setUrl('https://api.aktivexpress.uz/auth-signup-phone')
                ->setData(['phone' => $phone])
                ->send();

            if ($response->isOk) {
                Yii::$app->session->set('auth_phone', $phone);
                return ['success' => true, 'message' => 'SMS code sent successfully!'];
            } else {
                return [
                    'success' => false,
                    'message' => 'Failed to send SMS. Status: ' . $response->getStatusCode(),
                    'response_body' => $response->getContent()
                ];
            }
        } catch (\Exception $e) {
            Yii::error('SMS send error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Connection error. Try again.',
                'exception' => $e->getMessage()
            ];
        }


    }


    /**
     * Step 2: Verify SMS code
     */
    public function actionLoginCode()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        Yii::info("=== LoginCode START ===", __METHOD__);

        if (!Yii::$app->request->isAjax) {
            Yii::info("Request not AJAX", __METHOD__);
            return ['success' => false, 'message' => 'Invalid request'];
        }

        $phone = Yii::$app->request->post('phone');
        $code = Yii::$app->request->post('code');
        $sessionPhone = Yii::$app->session->get('auth_phone');

        Yii::info("Raw input: phone='$phone', code='$code', sessionPhone='$sessionPhone'", __METHOD__);

        $phone = preg_replace('/\D+/', '', (string)$phone);
        $code  = trim((string)$code);

        Yii::info("Processed input: phone='$phone', code='$code'", __METHOD__);

        if ($phone !== $sessionPhone) {
            Yii::info("Session phone mismatch", __METHOD__);
            return ['success' => false, 'message' => 'Session expired. Try again.'];
        }

        if (empty($code) || strlen($code) !== 5) {
            Yii::info("Invalid code length", __METHOD__);
            return ['success' => false, 'message' => 'Invalid SMS code'];
        }

        try {
            Yii::info("Sending API request...", __METHOD__);
            $response = Yii::$app->httpClient->createRequest()
                ->setMethod('POST')
                ->setUrl('https://api.aktivexpress.uz/auth-signup-code')
                ->setData([
                    'phone' => $phone,
                    'code'  => $code,
                ]) // Yii automatically sends multipart/form-data when no format is specified
                ->send();

            Yii::info('API Response raw: ' . $response->getContent(), __METHOD__);

            if (!$response->isOk) {
                Yii::error("HTTP request failed: Status {$response->statusCode}", __METHOD__);
                return ['success' => false, 'message' => 'API connection failed'];
            }

            if (!isset($response->data['data']['token'])) {
                Yii::error('Token missing in API response: ' . json_encode($response->data), __METHOD__);
                return ['success' => false, 'message' => 'Invalid SMS code. Please try again.'];
            }

            $data = $response->data['data'];
            Yii::info("Token received: " . $data['token'], __METHOD__);

            // Find or create user
            $user = User::findOne(['phone' => $phone]);
            if (!$user) {
                Yii::info("Creating new user for phone: $phone", __METHOD__);
                $user = new User();
                $user->phone = $phone;
                $user->name = 'User';
                $user->auth_key = Yii::$app->security->generateRandomString();
//                $user->created_at = time();
            }

            $user->access_token = $data['token'];
            $user->external_id = $data['id'] ?? null;
//            $user->updated_at = time();

            if ($user->save()) {
                Yii::info("User saved successfully, logging in", __METHOD__);
                Yii::$app->session->remove('auth_phone');
                Yii::$app->user->login($user, 3600 * 24 * 30);

                Yii::info("=== LoginCode END SUCCESS ===", __METHOD__);
                return [
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect' => Yii::$app->user->returnUrl ?: Yii::$app->homeUrl
                ];
            } else {
                Yii::error("Failed to save user: " . json_encode($user->errors), __METHOD__);
                return ['success' => false, 'message' => 'Failed to save user data'];
            }

        } catch (\Exception $e) {
            Yii::error('Exception caught in LoginCode: ' . $e->getMessage(), __METHOD__);
            return ['success' => false, 'message' => 'Connection error. Try again.'];
        }
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
























