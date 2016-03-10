<?php

namespace backend\controllers;

use common\models\form\ExerciseForm;
use Yii;
use common\models\Exercise;
use yii\base\Exception;
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
    public function actionIndex($group_id)
    {
        $model = ExerciseForm::find()
            ->where(['group_id' => $group_id])
            ->all();

        return $this->render('index', [
            'model' => $model,
            'group_id'  => $group_id,
        ]);
    }

    /**
     * Creates a new Exercise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($group_id)
    {
        $model = new ExerciseForm();

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {

                if (!$model->save()) {
                    throw new Exception();
                }

                if ($model->link_to_youtube) {
                    $model->attachLink();
                }

                Yii::$app->session->setFlash('success', Yii::t('app', 'Exercise').' '.$model->name. ' успешно создано');
                $transaction->commit();

            }catch (Exception $ex) {

                Yii::$app->session->setFlash('error', Yii::t('app', 'Exercise').' '.$model->name. ' успешно создано');
                $transaction->rollBack();
            }

            return $this->redirect(['index', 'group_id' => $model->group_id]);

        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Exercise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->link_to_youtube = $model->getYoutube()->link;

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {

                if (!$model->save()) {
                    throw new Exception();
                }

                if ($model->link_to_youtube) {
                    $model->attachLink();
                }

                $transaction->commit();
                Yii::$app->session->setFlash('success', Yii::t('app', 'Exercise').' '.$model->name. ' успешно обновлено');

            }catch (Exception $ex) {

                Yii::$app->session->setFlash('success', Yii::t('app', 'Error flash update'));
                $transaction->rollBack();
            }

            return $this->redirect(['index', 'id' => $model->group_id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Exercise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $this->findModel($id)->delete();
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
