<?

namespace common\components\db_rbac;

use developeruz\db_rbac\behaviors\AccessBehavior as AccessBehaviorBase;
use ReflectionProperty;
use Yii;
use yii\di\Instance;
use yii\web\BadRequestHttpException;
use yii\web\User;

class AccessBehavior extends AccessBehaviorBase
{
    protected $_rulesReflection;

    public function __construct()
    {
        $this->_rulesReflection = new ReflectionProperty('developeruz\db_rbac\behaviors\AccessBehavior', '_rules');
        $this->_rulesReflection->setAccessible(true);
    }

    public function interception($event)
    {
        $route = Yii::$app->getRequest()->resolve();

        $this->createRule();
        /** @var \yii\web\User $user */
        $user = Instance::ensure(Yii::$app->user, User::className());
        $request = Yii::$app->getRequest();
        $action = $event->sender->controller->action;

        if (!$this->cheсkByRule($action, $user, $request)) {

            if (!$this->checkPermission($route)) {
                if ($user->isGuest) {
                    $user->loginRequired();
                } else {
                    throw new BadRequestHttpException(Yii::t('app', 'Недостаточно прав'));
                }
            }
        }
    }

    protected function createRule()
    {
        if (empty($this->_rulesReflection->getValue($this))) {
            parent::createRule();
        }
    }
}