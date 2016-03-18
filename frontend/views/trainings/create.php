<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Exercise;

/* @var $this yii\web\View */
/* @var $model common\models\Trainings */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('/js/app.create-trainings.js', [
    'depends'  => [
        'yii\web\JqueryAsset',
    ]
]);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b> создание тренировки </b></h4>
            <div class="row">
                <div class="col-md-6">
                    <?php $form = ActiveForm::begin([
                        'options' =>
                            [
                                'enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal'
                            ],
                        'fieldConfig' => [
                            'template' => "<div class='form-group'>
                                                 <label class='col-md-2 control-label'>{label}</label>
                                                 <div class='col-md-10'>{input}</div>
                                                 <div class='col-lg-8'>{error}</div>
                                           </div>",
                        ],
                    ]); ?>

                    <div id="trainings-selects">
                        <?= $form->field($model, 'exercise[]')->widget(Select2::className(),[
                            'data' => ArrayHelper::map(Exercise::find()->all(), 'id', 'name'),
                            'options' => [
                                'placeholder' => Yii::t('app', 'Choose the exercise...'),
                                'class' => 'exercise-create',
                            ],
                        ])?>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <?= Html::button('Add new', ['class' => 'btn btn-primary add-new-exercise'])?>

                </div>
            </div>
        </div>
    </div>
</div>