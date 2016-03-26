<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\components\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\Trainings */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('/js/app.create-trainings.js', [
    'depends'  => [
        'yii\web\JqueryAsset',
        'common\assets\LaddaAsset',
        'common\assets\SweetAlert',
        'common\assets\ProgressAsset',
    ]
]);
?>

<?php $form = ActiveForm::begin([
    'options' =>
        [
            'enctype' => 'multipart/form-data',
            'class' => 'form-horizontal'
        ],
    'fieldConfig' => [
        'template' => "<label class='col-md-2 control-label'>{label}</label>
                       <div class='col-md-10'>{input}</div>
                       <div class='col-lg-8'>{error}</div>",
    ],
]); ?>

<div class="row">
    <div class="card-box">
        <h4 class="m-t-0 header-title"><b> <?= Yii::t('app', 'Create training')?> </b></h4>
        <?= $form->field($model, 'description')->textarea()?>
    </div>
</div>

<div id="created-touch">
    <? foreach($model->trainingsExercise as $item): ?>

        <?= Helper::createHtmlExercise($item)?>

    <? endforeach; ?>
</div>

<div class="row">
    <div class="card-box">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-primary']) ?>
            <?= Html::button(Yii::t('app', 'Add exercise'), [
                'class' => 'btn btn-primary',
                'data-toggle' => 'modal',
                'data-target' => '#create-exercise',
            ])?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?= $this->render('_modal-form.php', [
    'model'       => $model,
    'modelTouch'  => $modelTouch,
])?>