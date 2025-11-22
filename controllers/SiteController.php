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


        if (!Yii::$app->request->isAjax) {
            return ['success' => false, 'message' => Yii::t('app', 'Invalid request')];
        }

        $phone = Yii::$app->request->post('phone');

        if (!preg_match('/^9989[012345789][0-9]{7}$/', $phone)) {
            return ['success' => false, 'message' => Yii::t('app', 'Invalid phone number format')];
        }

        try {
            $response = Yii::$app->httpClient->createRequest()
                ->setMethod('POST')
                ->setUrl('https://api.aktivexpress.uz/auth-signup-phone')
                ->setData(['phone' => $phone])
                ->send();

            if ($response->isOk) {
                Yii::$app->session->set('auth_phone', $phone);
                return ['success' => true, 'message' => Yii::t('app', 'SMS code sent successfully!')];
            } else {
                return [
                    'success' => false,
                    'message' => Yii::t('app', 'Failed to send SMS. Status: {status}' , [
                        'status' => $response->getStatusCode()
                    ]),
                    'response_body' => $response->getContent()
                ];
            }
        } catch (\Exception $e) {
            Yii::error('SMS send error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => Yii::t('app', 'Connection error. Try again.'),
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


        if (!Yii::$app->request->isAjax) {
            return ['success' => false, 'message' => Yii::t('app', 'Invalid request')];
        }

        $phone = Yii::$app->request->post('phone');
        $code = Yii::$app->request->post('code');
        $sessionPhone = Yii::$app->session->get('auth_phone');


        $phone = preg_replace('/\D+/', '', (string)$phone);
        $code  = trim((string)$code);


        if ($phone !== $sessionPhone) {
            return ['success' => false, 'message' => Yii::t('app', 'Session expired. Try again.')];
        }

        if (empty($code) || strlen($code) !== 5) {
            return ['success' => false, 'message' => Yii::t('app', 'Invalid SMS code')];
        }

        try {
            $response = Yii::$app->httpClient->createRequest()
                ->setMethod('POST')
                ->setUrl('https://api.aktivexpress.uz/auth-signup-code')
                ->setData([
                    'phone' => $phone,
                    'code'  => $code,
                ]) // Yii automatically sends multipart/form-data when no format is specified
                ->send();


            if (!$response->isOk) {
                return ['success' => false, 'message' => Yii::t('app', 'API connection failed')];
            }

            if (!isset($response->data['data']['token'])) {
                return ['success' => false, 'message' => Yii::t('app', 'Invalid SMS code. Please try again.')];
            }

            $data = $response->data['data'];

            // Find or create user
            $user = User::findOne(['phone' => $phone]);
            if (!$user) {
                $user = new User();
                $user->phone = $phone;
                $user->name = 'User';
                $user->auth_key = Yii::$app->security->generateRandomString();
            }

            $user->access_token = $data['token'];
            $user->external_id = $data['id'] ?? null;

            //            Attempting Log In With Registered Number
            if (empty($user->auth_key)) {
                $user->auth_key = Yii::$app->security->generateRandomString();
            }

            if (empty($user->name)) {
                $user->name = 'User';
            }
            //            Attempting Log In With Registered Number

            if ($user->save()) {
                Yii::$app->session->remove('auth_phone');
                Yii::$app->user->login($user, 3600 * 24 * 30);

                return [
                    'success' => true,
                    'message' => Yii::t('app', 'Login successful!'),
                    'redirect' => Yii::$app->user->returnUrl ?: Yii::$app->homeUrl
                ];
            } else {
                return ['success' => false, 'message' => Yii::t('app', 'Failed to save user data')];

            }

        } catch (\Exception $e) {
            return ['success' => false, 'message' => Yii::t('app', 'Connection error. Try again.')];
        }
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
























