<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Exercise */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'options' =>
        [
            'enctype' => 'multipart/form-data',
        ],
    'fieldConfig' => [
        'template' => " <div class=\"form-group\"><label for=\"userName\">{label}</label>{input}<div class=\"col-lg-8\">{error}</div></div>",
    ],
]); ?>

<p class="text-muted font-13 m-b-30">
    Your awesome text goes here.
</p>

    <?= $form->field($model, 'name')?>

    <?= $form->field($model, 'description')->textarea()?>

    <?= $form->field($model, 'chest')?>

    <?= $form->field($model, 'back')?>

    <?= $form->field($model, 'hips')?>

    <?= $form->field($model, 'link_to_youtube')?>

    <div class="form-group text-right m-b-0">

    </div>

<?php ActiveForm::end(); ?>