<?

namespace frontend\models\form;

use yii\base\Model;

class TrainingForm extends Model
{
    public $trainings;
    public $exercise;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['trainings'], 'string'],
            [['exercise'], 'string'],
        ]);
    }
}