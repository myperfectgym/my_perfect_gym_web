<?php

namespace backend\controllers;

use Yii;
use common\models\GroupExercise;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupExerciseController implements the CRUD actions for GroupExercise model.
 */
class GroupExerciseController extends Controller
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
     * Lists all GroupExercise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = GroupExercise::find()
            ->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single GroupExercise model.
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
     * Creates a new GroupExercise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GroupExercise();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', Yii::t('app', 'Group exercise').' '.$model->name.' успешно создан');
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing GroupExercise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Group exercise').' '.$model->name.' успешно создан');
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing GroupExercise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $this->findModel($id)->delete();
    }

    /**
     * Finds the GroupExercise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupExercise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GroupExercise::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
