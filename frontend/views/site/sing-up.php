<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title =  Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class=" card-box">
    <div class="panel-heading">
        <h3 class="text-center"> <?= Yii::t('app', 'Registration')?> </h3>
    </div>


    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal m-t-20'],
            'fieldConfig' => [
                'template' => "<div class=\"form-group \"><div class=\"col-xs-12\">{input}</div><div class=\"col-lg-8\">{error}</div></div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => $model->getAttributeLabel('password_repeat')]) ?>

        <div class="form-group text-center m-t-40">
            <div class="col-xs-12">
                <?= Html::submitButton(Yii::t('app', 'Registration'), ['class' => 'btn btn-pink btn-block text-uppercase waves-effect waves-light', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-center">
        <p>
            <?= Yii::t('app', 'Already have account?')?>
            <a href="/site/login" class="text-primary m-l-5">
                <b><?= Yii::t('app', 'Sing in')?></b>
            </a>
        </p>
    </div>
</div>
