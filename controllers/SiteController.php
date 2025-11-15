<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Users();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionSendOtp()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $phone = Yii::$app->request->post('phone');
        $phone = preg_replace('/\D/', '', $phone);

        if (strpos($phone, "998") !== 0) {
            $phone = "998" . $phone;
        }

        $user = Users::findOne(['phone' => $phone]);
        if (!$user) {
            $user = new Users();
            $user->phone = $phone;
            $user->save(false);
        }

        $otp = rand(10000, 99999);

        $user->otp_code = $otp;
        $user->otp_expires_at = time() + 300;
        $user->save(false);

        $message = YII_ENV_DEV ? "Bu Eskiz dan test" : "Sizning tasdiqlash kodingiz: $otp";

//        $result = Yii::$app->eskiz->sendSms($phone, $message);
        $result = ['status'=>'skipped (test)'];
        return ['success' => true, 'response' => $result];
    }
    public function actionVerifyOtp()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $phone = Yii::$app->request->post('phone');
        $otp = Yii::$app->request->post('otp');

        $user = Users::findOne(['phone' => $phone]);

        if (!$user || $user->otp_code != $otp)
            return ['success' => false, 'message' => 'Noto‘g‘ri kod'];

        if ($user->otp_expires_at < time())
            return ['success' => false, 'message' => 'Kod eskirgan'];

        Yii::$app->user->login($user, 3600 * 24 * 30);

        return ['success' => true];
    }




    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
