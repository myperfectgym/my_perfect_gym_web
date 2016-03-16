<?php
namespace frontend\models\form;

use common\models\Files;
use Yii;
use common\models\User;

class UserForm extends User
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
        ]);
    }

    public function getImageFile()
    {
        return Files::find()
            ->where(['model_id' => $this->id, 'modelname' => UserForm::className()])
            ->one();
    }

}
