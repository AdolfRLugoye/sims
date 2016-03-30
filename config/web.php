<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'OdanWixt34-CdxFB8010OxUUNnclr8sH',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            //'useFileTransport' => false,
            'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'arlugoye@gmail.com',
            'password' => 'cazcwxmjxuznencn',
            'port' => '587',
            'encryption' => 'tls',
                        ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ]
    ],
    'modules' => [
        'admin' => [
           // 'class' => 'mdm\admin\Module',
           'class' => '\app\modules\admin\Module'
        ],
        'registration' => [
           'class' => '\app\modules\registration\Module'
        ],
        
        
        'dynagrid'=>[
        'class'=>'\kartik\dynagrid\Module',
        // other settings (refer documentation)
        ],
        'gridview'=>[
        'class'=>'\kartik\grid\Module',
        // other module settings
        ],
    ],
    
//    'as access' => [
//        'class' => 'mdm\admin\components\AccessControl',
//        'allowActions' => [
//            'admin/*', // add or remove allowed actions to this list
//        ],
//    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
