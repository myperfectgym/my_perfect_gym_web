<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="text-center">
            <?= Html::button(Yii::t('app', 'Create training'), [
                'class' => 'btn btn-primary btn-rounded waves-effect waves-light',
                'data-toggle' => 'modal',
                'data-target' => '#create',
            ])?>
        </div>
    </div>
</div>

<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                    ],
                'fieldConfig' => [
                    'template' => "<div class='form-group'>
                                        <label>{label}</label>
                                        {input}
                                        <div class='col-lg-8'>
                                            {error}
                                        </div>
                                   </div>",
                ],
            ]); ?>

            <div class="modal-body">

                <?= $form->field($model, 'name')?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?= Yii::t('app', 'Close')?></button>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
