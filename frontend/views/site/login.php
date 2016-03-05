<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class=" card-box">

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

        <?= $form->field($model, 'password')->passwordInput()->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"checkbox checkbox-primary\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>


        <div class="form-group text-center m-t-40">
            <div class="col-xs-12">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-pink btn-block text-uppercase waves-effect waves-light', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-center">
        <p><?= Yii::t('app', 'Don\'t have an account?')?>
            <a href="/site/sing-up" class="text-primary m-l-5">
                <b><?= Yii::t('app', 'Sing up')?></b>
            </a>
        </p>
    </div>
</div>
