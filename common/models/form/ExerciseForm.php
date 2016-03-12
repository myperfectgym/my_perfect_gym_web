<?

namespace common\models\form;

use common\models\Exercise;
use common\models\Youtube;
use yii\base\Exception;
use common\models\Files;

class ExerciseForm extends Exercise
{
    public $link_to_youtube;
    public $files;

    public function init()
    {
        parent::init();

        $this->link_to_youtube = $this->getYoutube();
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['link_to_youtube'], 'string'],
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 6],
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'link_to_youtube' => 'Ссылка на youtube',
            'files' => 'Картинки'
        ]);
    }

    public function beforeDelete()
    {
        foreach($this->getImageFile() as $file) {
            $file->delete();
        }

        return parent::beforeDelete();
    }


    //Need rewrite to model Youtube;
    public function attachLink()
    {
        $model = $this->getYoutube();

        if (!$model) {
            $model = new Youtube();
        }

        if ($model->oldAttributes['link'] == $this->link_to_youtube) {
            return;
        }

        $model->model_id = $this->id;
        $model->name = $this->name;
        $model->modelname = $this::className();
        $model->link = $this->link_to_youtube;

        if (!$model->save()) {

            throw new Exception();
        }
    }

    public function getYoutube()
    {
        return Youtube::find()
            ->where([
                'model_id' => $this->id,
                'modelname' => $this::className(),
            ])
            ->one();
    }

    public function getImageFile()
    {
        return Files::find()
            ->where(['model_id' => $this->id, 'modelname' => $this::className()])
            ->all();
    }
}