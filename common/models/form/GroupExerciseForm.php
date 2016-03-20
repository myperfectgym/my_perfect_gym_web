<?

namespace common\models\form;

use common\models\GroupExercise;
use common\models\Files;

class GroupExerciseForm extends GroupExercise
{
    public $file;

    public function init()
    {
        parent::init();
    }

    public function afterFind()
    {
        parent::afterFind();
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'file' => 'Картинка'
        ]);
    }

    public function beforeDelete()
    {
        if ($this->getImageFile()) {
            $this->getImageFile()->delete();
        }
        return parent::beforeDelete();
    }

    public function getImageFile()
    {
        return Files::find()
            ->where(['model_id' => $this->id, 'modelname' => $this::className()])
            ->one();
    }
}