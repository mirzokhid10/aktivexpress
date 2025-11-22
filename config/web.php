<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage' => 'en',
    'language' => 'xx',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pxKSIuGzJCif_N-TEyuBbI2VSMd9TJxG',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'session' => [
            'class' => 'yii\web\Session',
        ],

        'httpClient' => [
            'class' => 'yii\httpclient\Client',
        ],

        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@runtime/logs/app.log',

                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'languages' => ['uz_cyrl', 'uz', 'ru','en',],
            'rules' => [
                '<language:(en|ru|uz|uz_cyrl)>/<controller>/<action>' => '<controller>/<action>',
            ],
        ],

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'on missingTranslation' => function($event) {
                        Yii::warning("Missing translation: {$event->message} in category {$event->category}", __METHOD__);
                    },

                    'fileMap' => [
                        'app' => 'header.php',
                        'main' => 'header.php',
                    ]
                ],
                'hero*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'on missingTranslation' => function($event) {
                        Yii::warning("Missing translation: {$event->message} in category {$event->category}", __METHOD__);
                    },

                    'fileMap' => [
                        'hero' => 'hero.php',
                    ],

                ],
                'calc*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'calc' => 'calculation.php',
                    ],
                ],
                'feat*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'feat' => 'feature.php',
                    ],
                ],
                'serv*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'serv' => 'services.php',
                    ],
                ],
                'order*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'order' => 'order.php',

                    ],
                ],
                'about*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'about' => 'about.php',
                    ],
                ],
                'address*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'address' => 'address.php',
                    ],
                ],
                'myorder*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'myorder' => 'myorder.php',
                    ],
                ],
                'tariffs*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'tariffs' => 'tariffs.php',
                    ],
                ],
                'tgbot*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'tgbot' => 'tgbot.php',
                    ],
                ],
                'faq*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'faq' => 'faq.php',
                    ],
                ],
            ]
        ]


    ],
    'params' => $params,
    'on beforeRequest' => function () {
        $lang = Yii::$app->session->get('language');

        if (!$lang) {
            $lang = 'uz'; // your main default language
            Yii::$app->session->set('language', $lang);
        }

        Yii::$app->language = $lang;
    },

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
        'panels' => [
            'ajax' => false, // disable ajax toolbar
        ],
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
