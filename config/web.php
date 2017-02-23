<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

//defined('YII_DEBUG') or define('YII_DEBUG', true);


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['debug'],
	'homeUrl' => '/',
	'modules' => [
   'debug' => [
     'class' => 'yii\debug\Module',
     'allowedIPs' => ['*'],
     ], 
	],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'QNqikcwMfJjuAjFUEkj48mavZOLAr4Ai',
			'baseUrl' => '',
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			'enableStrictParsing' => false,
            'rules' => [
			
	     	 'blog'=>'blog/index',
			 '<action:\w+>'=>'site/<action>',
			 
            ],
        ],
        
    ],
    'params' => $params,
];

if( 'dev' == YII_ENV ) {
	
	defined('YII_DEBUG') or define('YII_DEBUG', true);

	
	
}

return $config;
