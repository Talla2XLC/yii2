<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'language' => 'ru',
	'id' => 'AI_TaskManager',
	'name' => 'AI Task Manager',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log', 'bootstrap'],
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
        '@uploads' => '@app/web/uploads'
	],
	'components' => [
	    'i18n' => [
	        'translations' => [
	            'app*' => [
	                'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@app/messages'
                ]
            ]
        ],
		'bootstrap' => [
			'class' => \app\components\Bootstrap::class,
		],
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'CKvEFvaspSiHf5cBO1n0nGl8BMQ7ko6e',
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'cache1' => [
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
		/*
			        'urlManager' => [
			            'enablePrettyUrl' => true,
			            'showScriptName' => false,
			            'rules' => [
			            ],
			        ],
		*/
	],
	'params' => $params,
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
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
