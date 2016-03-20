<?

namespace common\widgets;

/**
 * @var $model ActiveRecord
 */

use yii\base\Widget;
use yii\db\ActiveRecord;

class Carousel extends Widget
{
    public $photos = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('carousel',
            [
                'photos' => $this->photos,
            ]);
    }
}