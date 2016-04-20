<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name'=>'PoS Web',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'U8oxKq8Bve1kqsL4l0SynXl6c6iJcoJD',
        ],
        
        'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/almasaeed2010/adminlte/pages'
                ],
            ],
        ],


        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Usuario',
            'enableAutoLogin' => false,
            'loginUrl' => ['site/login'],
            'as authLog' => [
                'class' => 'yii2tech\authlog\AuthLogWebUserBehavior'
                ],
        ],
              
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
           
        ],
        
    ],
	
	'modules' => [
        
        'registros' => [
            'class' => 'app\modules\registros\Registros',
            
        ],
    
          
        'rbac' =>  [
        'class' => 'johnitvn\rbacplus\Module',
        'userModelClassName'=>null,
        'userModelIdField'=>'idUsuario',
        'userModelLoginField'=>'username',
        'userModelLoginFieldLabel'=>null,
        'userModelExtraDataColumls'=>null,
        'beforeCreateController'=>null,
        'beforeAction'=>null
        ],
            
        'gridview' =>  [
        'class' => '\kartik\grid\Module'
        ],
            
        'asignacion' => [
            'class' => 'app\modules\asignacion\Module',
        ],
            
        'ventas' => [
            'class' => 'app\modules\ventas\Module',
        ],   
    ],
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
