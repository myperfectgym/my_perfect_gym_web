<?

namespace frontend\models\form;

use common\models\Touch;

class TouchForm extends Touch
{

    public $exercise;
    public $exercise_id;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['exercise_id'], 'required'],
            [['exercise_id'], 'integer']
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'exercise_id' => \Yii::t('app', 'Exercise'),
        ]);
    }
}