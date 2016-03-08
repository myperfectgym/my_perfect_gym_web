<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $link_to_youtoub
 *
 * @property TrainingsExercise[] $trainingsExercises
 */
class Exercise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exercise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name', 'link_to_youtoub'], 'string', 'max' => 255],
            [['group_id'], 'integer']
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
            'description' => 'Description',
            'link_to_youtoub' => 'Link To Youtoub',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingsExercises()
    {
        return $this->hasMany(TrainingsExercise::className(), ['exercise_id' => 'id']);
    }

    public function getGroupExercise()
    {
        return $this->hasOne(GroupExercise::className(), ['id' => 'group_id']);
    }
}
