<?php

namespace backend\controllers;

use common\models\form\ExerciseForm;
use Yii;
use common\models\Exercise;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Files;

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
                    'add-new-photo' => ['post'],
                    'delete-image' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== "add-new-photo");
        $this->enableCsrfValidation = ($action->id !== "delete-image");
        return parent::beforeAction($action);
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
    public function actionCreate()
    {

        $model = new ExerciseForm();

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {

                $model->files = UploadedFile::getInstances($model, 'files');

                if (!$model->save()) {
                    throw new Exception();
                }

                foreach ($model->files as $file) {

                    $fileModel = new Files();

                    $fileModel->attachModel($model, $file);
                }

                if ($model->link_to_youtube) {
                    $model->attachLink();
                }

                Yii::$app->session->setFlash('success', Yii::t('app', 'Exercise').' '.$model->name. ' успешно создано');
                $transaction->commit();

            }catch (Exception $ex) {

                Yii::$app->session->setFlash('error', 'Ошибка при создании: '.Yii::t('app', 'Exercise').' '.$model->name);
                $transaction->rollBack();
            }

            return $this->redirect(['index', 'group_id' => $model->group_id]);
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

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            try {

                if (!$model->save()) {
                    throw new Exception();
                }

                $model->attachLink();

                $transaction->commit();
                Yii::$app->session->setFlash('success', Yii::t('app', 'Exercise').' '.$model->name. ' успешно обновлено');

            }catch (Exception $ex) {

                Yii::$app->session->setFlash('error', Yii::t('app', 'Error flash update'));
                $transaction->rollBack();
            }

            return $this->redirect(['index', 'group_id' => $model->group_id]);
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

    public function actionAddNewPhoto()
    {
        $id = Yii::$app->request->post('id');
        $model = $this->findModel($id);

        $files = [];

        foreach($_FILES['file']['name'] as $key => $file) {
            $uploadFile = new UploadedFile();
            $uploadFile->name = $_FILES['file']['name'][$key];
            $uploadFile->type = $_FILES['file']['type'][$key];
            $uploadFile->tempName = $_FILES['file']['tmp_name'][$key];
            $uploadFile->error = $_FILES['file']['error'][$key];
            $uploadFile->size = $_FILES['file']['size'][$key];
            $files[] = $uploadFile;
        }

        foreach ($files as $file) {
            $fileModel = new Files();
            $fileModel->attachModel($model, $file);
        }
    }

    public function actionDeleteImage() {

        $id = Yii::$app->request->post('id');

        Files::find()
            ->where(['id' => $id])
            ->one()->delete();
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
