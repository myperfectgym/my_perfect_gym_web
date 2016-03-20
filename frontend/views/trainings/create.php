<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\components\Helper;
use common\widgets\Carousel;

/* @var $this yii\web\View */
/* @var $model common\models\Trainings */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('/js/app.create-trainings.js', [
    'depends'  => [
        'yii\web\JqueryAsset',
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
        <h4 class="m-t-0 header-title"><b> Создание тренировки </b></h4>
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
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
            <?= Html::button('Add new', [
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