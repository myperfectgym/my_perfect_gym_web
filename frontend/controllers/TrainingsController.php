<?php

namespace frontend\controllers;

use frontend\models\form\TrainingForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class TrainingsController extends Controller {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate() {

        $model = new TrainingForm();

        if (Yii::$app->request->isPost) {

            echo "<pre>";
                print_r(Yii::$app->request->post());
            echo "</pre>";
            exit;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCalendar() {

        return $this->render('calendar');
    }
}
?>