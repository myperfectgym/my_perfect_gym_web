<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Trainings */
/* @var $form yii\widgets\ActiveForm */
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
                            'template' => "{input}<div class=\"col-lg-8\">{error}</div>",
                        ],
                    ]); ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Text</label>
                                <div class="col-md-10">
                                    <?= $form->field($model, 'description')->textarea() ?>
                                </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>