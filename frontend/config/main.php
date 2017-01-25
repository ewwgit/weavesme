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
						/* 'modules' => [
								'rbac' => [
										'class' => 'yii2mod\rbac\Module',
										// Some controller property maybe need to change.
										'controllerMap' => [
												'assignment' => [
														'class' => 'yii2mod\rbac\controllers\AssignmentController',
														'userIdentityClass' => 'app\models\User',
														'searchClass' => '',
														'idField' => 'id',
														'usernameField' => 'username',
														'gridViewColumns' => [
																'id',
																'username',
																'email'
														]
												]
										]
								],
						] */
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
    						'vendors-products' => 'vendor/products/index',
    						'vendors-products-create' => 'vendor/products/create',
    						'vendors-products-update' => 'vendor/products/update',
    						
    						
    				]
    		],
    		/* 'authManager' => [
    				'class' => 'yii\rbac\DbManager',
    				
    		], */
        'user' => [ 
						'identityClass' => 'common\models\User',
						'enableAutoLogin' => true ,
						'identityCookie' => [
								'name' => '_frontendUser', // unique for frontend
								'path'=>'/frontend/web'  // correct path for the frontend app.
						]
				],
				'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => true, 'lifetime' => 3600 * 24 * 30],
            'timeout' => 3600 * 24 * 30,
            'useCookies' => true,
			'name' => '_frontendSessionId', // unique for frontend
			'savePath' => __DIR__ . '/../runtime', // a temporary folder on frontend
        ],
    		
    		'customer' => [
    				'class' => 'common\components\Customer',
    		
    		],
    		'vendoruser' => [
    				'class' => 'common\components\Vendoruser',
    		
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
