<?
namespace frontend\models;

use common\models\User;
use Yii;

class SingUpForm extends User
{
    public $password_repeat;
    public $password;

    public function rules()
    {
        return array_merge(parent::rules(),
            [
                [['password', 'password_repeat', 'username', 'email'], 'required'],
                ['username', 'validateUsername'],
                ['email', 'email'],
                ['email', 'validateEmail'],
                ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'password repeat don\'t')]
            ]);
    }

    public function attributeLabels()
    {
        return [
            'password_repeat' => Yii::t('app', 'Password repeat'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->setPassword($this->password);
            $this->generateAuthKey();
            $this->generatePasswordResetToken();
            return true;
        } else {
            return false;
        }
    }

    public function afterSave ($insert, $changedAttributes)
    {
        $userRole = Yii::$app->authManager->getRole('user');
        Yii::$app->authManager->assign($userRole, $this->getId());
    }

    public function validateUsername($attribute, $params)
    {
        $user = User::find()
            ->where(['username' => $this->username])
            ->one();

        if ($user) {
            $this->addError($attribute, Yii::t('app', 'A user with this name already exists'));
        }
    }

    public function validateEmail($attribute, $params)
    {
        $user = User::find()
            ->where(['email' => $this->email])
            ->one();

        if ($user) {
            $this->addError($attribute, Yii::t('app', 'A user already exists with this email address'));
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this);
        } else {
            return false;
        }
    }
}