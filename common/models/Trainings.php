<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trainings".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $description
 * @property string $date
 *
 * @property User $user
 */
class Trainings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trainings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name'], 'required'],
            [['user_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => Yii::t('app', 'Name trainings'),
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getTrainingsExercise()
    {
        return $this->hasMany(TrainingsExercise::className(), ['trainings_id' => 'id']);
    }
}
