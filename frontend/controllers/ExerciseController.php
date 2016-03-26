<?php

namespace frontend\controllers;

use common\models\form\ExerciseForm;
use common\models\GroupExercise;
use Yii;
use common\models\Exercise;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExerciseController implements the CRUD actions for Exercise model.
 */
class ExerciseController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Exercise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $models = ExerciseForm::find()->all();
        $groupExercise = GroupExercise::find()->all();

        return $this->render('index', [
            'models' => $models,
            'groupExercise' => $groupExercise,
        ]);
    }

    /**
     * Displays a single Exercise model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Finds the Exercise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exercise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExerciseForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
