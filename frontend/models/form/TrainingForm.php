<?

namespace frontend\models\form;

use common\models\Trainings;

class TrainingForm extends Trainings
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['trainings'], 'string'],
            [['exercise'], 'string'],
        ]);
    }
}