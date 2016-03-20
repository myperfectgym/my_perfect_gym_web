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

        <div class='row'>
            <div class='portlet'>
                <div class='portlet-heading bg-inverse'>
                    <h3 class='portlet-title'>
                        <?= Html::a($item->exercise->name, ['/exercise/view', 'id' => $item->exercise->id])?>
                    </h3>
                    <div class='portlet-widgets'>
                        <a data-toggle='collapse' data-parent='#accordion1' href='#bg-default'><i class='ion-minus-round'></i></a>
                        <span class='divider'></span>
                        <a href='#' data-toggle='remove'><i class='ion-close-round'></i></a>
                    </div>
                    <div class='clearfix'></div>
                </div>

                <div id="bg-default" class="panel-collapse collapse in">
                    <div class="portlet-body">

                        <?= Helper::createHtmlExercise($item)?>

                    </div>
                </div>
            </div>
        </div>

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
    'modelTouch'  => $modelTouch,
])?>