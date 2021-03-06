<?php

namespace common\models;

use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "files".
 *
 * @property integer $id
 * @property string $filename
 * @property string $path
 * @property string $modelname
 * @property integer $model_id
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'path', 'modelname', 'model_id'], 'required'],
            [['model_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'path' => 'Path',
            'modelname' => 'Modelname',
        ];
    }

    public function beforeDelete()
    {
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/frontend/web' . $this->path)) {
            return parent::beforeDelete();
        }

        if(!unlink($_SERVER['DOCUMENT_ROOT'] . '/frontend/web' . $this->path)) {
           throw new Exception();
        };

        return parent::beforeDelete();
    }

    public function attachModel($model, $file)
    {
        $modelNameReplace = str_replace('\\', '/',$model::className());
        $this->modelname = $model::className();

        $serverPath = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/uploads/' . $modelNameReplace . '/' . $model->id . '/' . $file->baseName . '.' . $file->extension;
        $dirPath = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/uploads/' . $modelNameReplace . '/' . $model->id;

        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0777, true);
        }

        $file->saveAs($serverPath);
        $this->path = '/uploads/' . $modelNameReplace . '/' . $model->id . '/' . $file->baseName . '.' . $file->extension;
        $this->filename = $file->name;
        $this->model_id  = $model->id;

        if (!$this->save()) {
            throw new Exception();
        }
    }
}
