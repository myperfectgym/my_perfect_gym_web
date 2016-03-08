<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group_exercise".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Exercise[] $exercises
 */
class GroupExercise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_exercise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExercises()
    {
        return $this->hasMany(Exercise::className(), ['group_id' => 'id']);
    }
}
