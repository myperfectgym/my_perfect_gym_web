<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/',
    'components' => [
        'request' => [
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'as AccessBehavior' => [
        'class' => 'common\components\db_rbac\AccessBehavior',
        'rules' =>[
            'site' =>
                [
                    [
                        'actions' => ['login', 'logout'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                ],
            'debug/default' =>
                [
                    [
                        'actions' => [],
                        'allow' => true,
                    ],
                ],
            'permit/access' =>
                [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
