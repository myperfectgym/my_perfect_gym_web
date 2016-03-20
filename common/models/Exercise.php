<?php

namespace common\models;

use common\models\form\ExerciseForm;
use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
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
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'validateExerciseName'],
            [['group_id'], 'integer'],
            [['chest', 'back', 'hips'], 'integer', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'chest' => Yii::t('app', 'Chest'),
            'back' => Yii::t('app', 'Back'),
            'hips' => Yii::t('app', 'Hips'),
        ];
    }

    public function validateExerciseName($attribute, $params)
    {
        $user = Exercise::find()
            ->where(['name' => $this->name])
            ->one();

        if ($user) {
            $this->addError($attribute, Yii::t('app', 'A exercise with this name already exists'));
        }
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

    public function getImageFile()
    {
        return Files::find()
            ->where(['model_id' => $this->id, 'modelname' => ExerciseForm::className()])
            ->all();
    }
}
