<?

return [
    'class' => 'common\components\db_rbac\AccessBehavior',
    'rules' =>[
        'site' =>
            [
                [
                    'actions' => ['login', 'logout', 'registration'],
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
        'trainings' =>
            [
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['admin'],
                ],
                [
                    'actions' => ['index', 'create'],
                    'allow' => true,
                    'roles' => ['user'],
                ],
            ],
        'exercise' =>
            [
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['admin'],
                ],
                [
                    'actions' => ['index'],
                    'allow' => true,
                    'roles' => ['user']
                ]
            ],
        'user' =>
            [
                [
                    'actions' => ['update'],
                    'allow' => true,
                    'roles' => ['user'],
                ],
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['admin'],
                ]
            ],
        'debug/default' =>
            [
                [
                    'actions' => [],
                    'allow' => true,
                ],
            ],
        'gii' =>
            [
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['admin']
                ]
            ],
    ]
];