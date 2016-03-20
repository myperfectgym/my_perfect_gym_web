<?php

namespace frontend\controllers;

use common\components\Helper;
use common\models\Touch;
use common\models\Trainings;
use common\models\TrainingsExercise;
use frontend\models\form\TouchForm;
use frontend\models\form\TrainingForm;
use Yii;
use yii\base\Exception;
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
        $model = new Trainings();
        $modelTrainings = Trainings::find()
            ->where(['user_id' => Yii::$app->user->identity->getId()])
            ->all();

        if ($model->load(Yii::$app->request->post())) {

            if (!$model->user_id) {
                $model->user_id = Yii::$app->user->identity->getId();
            }

            if (!$model->save()) {
                throw new Exception();
            }

            return $this->redirect('trainings/create?id='.$model->id);
        }

        return $this->render('index', [
            'model' => $model,
            'modelTrainings'    => $modelTrainings,
        ]);
    }

    public function actionCreate($id) {

        $model = TrainingForm::findOne($id);
        $modelTouch = new TouchForm();

        if (Yii::$app->request->isPost) {

        }

        return $this->render('create', [
            'model' => $model,
            'modelTouch' => $modelTouch,
        ]);
    }

    public function actionCreateNewExercise() {

        $modelTrainingExercise = new TrainingsExercise();
        $transaction = Yii::$app->db->beginTransaction();

        if (Yii::$app->request->isPost) {

            try  {

                $modelTrainingExercise->trainings_id = Yii::$app->request->post('training_id');
                $modelTrainingExercise->exercise_id = Yii::$app->request->post('TouchForm')['exercise_id'];

                if (!$modelTrainingExercise->save()) {
                    throw new Exception();
                }

                foreach (Yii::$app->request->post('TouchForm')['number'] as $key => $item) {
                    $modelTouch = new Touch();
                    $modelTouch->trainings_exercise_id = $modelTrainingExercise->id;
                    $modelTouch->number = Yii::$app->request->post('TouchForm')['number'][$key];
                    $modelTouch->count = Yii::$app->request->post('TouchForm')['count'][$key];
                    $modelTouch->weight = Yii::$app->request->post('TouchForm')['weight'][$key];

                    if (!$modelTouch->save()) {
                        throw new Exception();
                    }
                }

                $transaction->commit();
                return Helper::createHtmlExercise($modelTrainingExercise);

            } catch(Exception $ex) {
                $transaction->rollBack();
            }
        }
    }
}
?>