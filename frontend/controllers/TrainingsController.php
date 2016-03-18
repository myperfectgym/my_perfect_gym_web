<?php

namespace frontend\controllers;

use frontend\models\form\TrainingForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use kartik\select2\Select2;
use common\models\Exercise;
use yii\helpers\ArrayHelper;


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
                    //'ajax-exercise-chose' => ['post'],
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

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {

            if ($action->id == 'ajax-exercise-chose') {
                $this->layout = 'empty';
            }

            return true;
        } else {
            return false;
        }
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

    public function actionAjaxExerciseChose() {

        $id = Yii::$app->request->post('id');

        return Select2::widget([
            'name' => 'TrainingForm[exercise][]',
            'data' => ArrayHelper::map(Exercise::find()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => Yii::t('app', 'Choose the exercise...'),
                'class' => 'exercise-create',
                'id' => 'trainingform-exercise-'.$id,
            ],
        ]);
    }

    public function actionCalendar() {

        return $this->render('calendar');
    }
}
?>