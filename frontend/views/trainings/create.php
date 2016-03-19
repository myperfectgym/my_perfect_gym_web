<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Exercise;
use \common\components\Helper;

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
        <h4 class="m-t-0 header-title"><b> создание тренировки </b></h4>
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

<div id="create-exercise" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'Create training')?></h4>
            </div>
            <?php $form = ActiveForm::begin([
                'options' =>
                    [
                        'enctype' => 'multipart/form-data',
                        'id' => 'create-new-exercise-form',
                    ],
                'fieldConfig' => [
                    'template' => "<div class='form-group'>
                                        {input}
                                        <div class='col-lg-8'>
                                            {error}
                                        </div>
                                   </div>",
                ],
            ]); ?>

            <input type="hidden" name="training_id" value="<?= $model->id?>">

            <div class="modal-body">

                <?= $form->field($modelTouch, 'exercise_id')->widget(Select2::className(),[
                    'data' => ArrayHelper::map(Exercise::find()->all(), 'id', 'name'),
                    'options' => [
                        'placeholder' => Yii::t('app', 'Choose the exercise...'),
                        'class' => 'reset',
                    ],
                ])?>

                <table class="table m-0">
                    <thead>
                    <tr>
                        <th><?= Yii::t('app', 'Number repeat')?></th>
                        <th><?= Yii::t('app', 'Count')?></th>
                        <th><?= Yii::t('app', 'Weight')?></th>
                    </tr>
                    </thead>
                    <tbody id="exercise-touch" class="portlet-heading">
                    <tr class="portlet touch">
                        <td><?= $form->field($modelTouch, 'number[]')->textInput([
                                'class' => 'form-control reset'
                            ])?></td>
                        <td><?= $form->field($modelTouch, 'count[]')->textInput([
                                'class' => 'form-control reset'
                            ])?></td>
                        <td><?= $form->field($modelTouch, 'weight[]')->textInput([
                                'class' => 'form-control reset'
                            ])?></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><?= Html::button(Yii::t('app', 'Add touch'), [
                                'class' => 'btn btn-primary',
                                'id'    => 'add-touch-button',
                            ])?></th>
                    </tr>
                    </tfoot>
                </table>
                </di>

                <div class="modal-footer">
                    <button type="button" id="modal-close" class="btn btn-default waves-effect" data-dismiss="modal"><?= Yii::t('app', 'Close')?></button>
                    <?= Html::submitButton(Yii::t('app', 'Create'), [
                        'class' => 'btn btn-primary',
                        'id' => 'create-new-exercise',
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>