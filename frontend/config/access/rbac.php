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
                    'actions' => ['calendar'],
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
];