<?

namespace common\models\form;

use common\models\Exercise;
use common\models\Youtube;
use yii\base\Exception;

class ExerciseForm extends Exercise
{
    public $link_to_youtube;

    public function init()
    {
        parent::init();

        $this->link_to_youtube = $this->getYoutube();
    }

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

    public function attachLink()
    {
        $model = $this->getYoutube();

        if (!$model) {
            $model = new Youtube();
        }

        if ($model->oldAttributes['link'] == $model->link) {
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
}