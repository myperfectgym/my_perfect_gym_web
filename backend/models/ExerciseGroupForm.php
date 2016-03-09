<?

namespace backend\models;

use common\models\GroupExercise;

class GroupExerciseForm extends GroupExercise
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
        ]);
    }

    public function getImageFile()
    {
        return Files::find()
            ->where(['model_id' => $this->id, 'modelname' => GroupExercise::className()])
            ->one();
    }

}