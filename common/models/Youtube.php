<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "links_video_from_youtube".
 *
 * @property integer $id
 * @property string $name
 * @property string $modelname
 * @property integer $model_id
 * @property string $link
 */
class Youtube extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'links_video_from_youtube';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelname', 'model_id'], 'required'],
            [['model_id'], 'integer'],
            [['name', 'modelname', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'modelname' => 'Modelname',
            'model_id' => 'Model ID',
            'link' => 'Link',
        ];
    }
}
