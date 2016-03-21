<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trainings_exercise".
 *
 * @property integer $training_id
 * @property integer $exercise_id
 *
 * @property Trainings $training
 * @property Exercise $exercise
 */
class TrainingsExercise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trainings_exercise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trainings_id', 'exercise_id'], 'required'],
            [['trainings_id', 'exercise_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trainings_id' => 'Training ID',
            'exercise_id' => 'Exercise ID',
        ];
    }

    public function beforeDelete()
    {
        foreach ($this->touch as $touch) {
            $touch->delete();
        }

        return parent::beforeDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTraining()
    {
        return $this->hasOne(Trainings::className(), ['id' => 'training_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExercise()
    {
        return $this->hasOne(Exercise::className(), ['id' => 'exercise_id']);
    }

    public function getTouch()
    {
        return $this->hasMany(Touch::className(), ['trainings_exercise_id' => 'id']);
    }
}
