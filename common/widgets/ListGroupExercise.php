<?

namespace common\widgets;

/**
 * @var $model ActiveRecord
 */

use common\models\form\GroupExerciseForm;
use yii\base\Widget;
use yii\db\ActiveRecord;

class ListGroupExercise extends Widget
{
    public $model = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $createModel = new GroupExerciseForm();

        return $this->render('list-group-exercise',
            [
                'model' => $this->model,
                'createModel' => $createModel,
            ]);
    }
}