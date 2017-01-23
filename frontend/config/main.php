<?php
use \yii\web\Request;
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
		'modules' => [
				'vendor' => [
						'class' => 'frontend\modules\vendor\vendorModule',
				],
		],
    'components' => [
        'request' => [
    				'baseUrl' => $baseUrl,
    				'enableCsrfValidation' => false,
    		],
    		'urlManager' => [
    				'baseUrl' => $baseUrl,
    				'enablePrettyUrl' => true,
    				'showScriptName' => false,
    				'rules' => [
    						'vendors' => 'vendor/vendor/index',
    						'vendors-signup' => 'vendor/vendor/signup',
    						'vendors-login' => 'vendor/vendor/login',
    						'vendors-logout' => 'vendor/vendor/logout',
    						'vendors-request-password-reset' => 'vendor/vendor/request-password-reset',
    						'vendors-reset-assword' => 'vendor/vendor/reset-password',
    						'vendors-about' => 'vendor/vendor/about',
    						'vendors-contact' => 'vendor/vendor/contact',
    						'vendors-profile-update' => 'vendor/vendor/update',
    						'vendors-branches' => 'vendor/branches/index',
    						'vendors-branches-create' => 'vendor/branches/create',
    						'vendors-branches-update' => 'vendor/branches/update',
    						'vendors-categories' => 'vendor/categories/index',
    						'vendors-categories-create' => 'vendor/categories/create',
    						'vendors-categories-update' => 'vendor/categories/update',
    						
    						
    				]
    		],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
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
