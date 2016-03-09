<?

return [
    'class' => 'common\components\db_rbac\AccessBehavior',
    'rules' =>[
        'site' =>
            [
                [
                    'actions' => ['login'],
                    'allow' => true,
                ],
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['admin'],
                ],
            ],
        'exercise' =>
            [
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['admin']
                ],
            ],
        'group-exercise' =>
            [
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['admin']
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