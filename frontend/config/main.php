<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
	'name'=>'frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'registration' => 'frontend\controllers\user\RegistrationController',
                'security' => 'frontend\controllers\user\SecurityController',
                'recovery' => 'frontend\controllers\user\RecoveryController'
            ],
            'modelMap' => [
                'RegistrationForm' => 'frontend\models\user\RegistrationForm',
                'User' => 'frontend\models\user\User',
                'LoginForm' => 'frontend\models\user\LoginForm',
            ],
            'enableConfirmation' => true,
            'enableUnconfirmedLogin' => true,
            'enableFlashMessages' => false,
        ],
        'usahawan' => [
            'class' => 'frontend\modules\usahawan\Module',
        ],
        'supplier' => [
            'class' => 'frontend\modules\supplier\Module',
        ],
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                        //'basePath' => '@app/messages',
                    // 'sourceLanguage' =>'ms-my',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
		
		'view' => [
			'theme' => [
				'pathMap' => [
					'@dektrium/user/views' => '@frontend/views/user'
				],
			],
		],
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => true,
        //     'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        // ], 
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
        'as beforeRequest' =>[
            'class'=>'frontend\components\CheckIfLoggedIn',
        ],
        'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'profile/*',
            'usahawan/*',
            //'application/*',
            //'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
            ]
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
	
	/* 'modules' => [
        'supplier' => [
            'class' => 'frontend\modules\supplier\Module',
        ],
		'catalog' => [
            'class' => 'frontend\modules\catalog\Module',
        ],
		'client' => [
            'class' => 'frontend\modules\client\Module',
        ],
    ], */
	
	
    'params' => $params,
];
