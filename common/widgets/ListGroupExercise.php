<?

namespace common\widgets;

/**
 * @var $model ActiveRecord
 */

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
        return $this->render('list-group-exercise',
            [
                'model' => $this->model,
            ]);
    }
}