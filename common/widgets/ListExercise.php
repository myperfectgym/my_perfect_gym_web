<?

namespace common\widgets;

/**
 * @var $model ActiveRecord
 */

use common\models\form\ExerciseForm;
use yii\base\Widget;
use yii\db\ActiveRecord;

class ListExercise extends Widget
{
    public $model = [];
    public $group_id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $createModel = new ExerciseForm();
        $createModel->group_id = $this->group_id;

        return $this->render('list-exercise',
            [
               'createModel' => $createModel,
               'model' => $this->model,
            ]);
    }
}