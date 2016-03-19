<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "touch".
 *
 * @property integer $trainings_exercise_id
 * @property integer $number
 * @property integer $count
 * @property integer $weight
 *
 * @property TrainingsExercise $trainingsExercise
 */
class Touch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'touch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trainings_exercise_id', 'number', 'count', 'weight'], 'required'],
            [['trainings_exercise_id', 'number', 'count', 'weight'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trainings_exercise_id' => 'Trainings Exercise ID',
            'number' => Yii::t('app', 'Number repeat'),
            'count' => Yii::t('app', 'Count'),
            'weight' => Yii::t('app', 'Weight'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingsExercise()
    {
        return $this->hasOne(TrainingsExercise::className(), ['id' => 'trainings_exercise_id']);
    }
}
