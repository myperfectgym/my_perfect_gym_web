<?

namespace common\models\form;

use common\models\Exercise;

class ExerciseForm extends Exercise
{
    public $link_to_youtube;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['link_to_youtube'], 'string']
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'link_to_youtube' => 'Ссылка на youtube',
        ]);
    }
}