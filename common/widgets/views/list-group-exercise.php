<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;

/**
 * @var $this \yii\web\View;
 */

$this->registerJs("
     $('.remove').click(function(){

        var id = $(this).data('id');
        $.post(
            '/admin/group-exercise/delete',
            {id: id},
            function(data){

            }
        );
    });
");
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <a href="#" data-toggle="modal" data-target="#create" class='btn btn-success btn-custom waves-effect waves-light'><?= Yii::t('app', 'Create group exercise')?></a>

            <div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'New exercise')?></h4>
                        </div>

                        <?php $form = ActiveForm::begin([
                            'options' =>
                                [
                                    'enctype' => 'multipart/form-data',
                                ],
                            'action'  => "/admin/group-exercise/create",
                            'fieldConfig' => [
                                'template' => " <div class=\"form-group\"><label for=\"userName\">{label}</label>{input}<div class=\"col-lg-8\">{error}</div></div>",
                            ],
                        ]); ?>

                        <div class="modal-body">

                            <p class="text-muted font-13 m-b-30">
                                <?= Yii::t('app', 'Create exercise')?>
                            </p>

                            <?= $form->field($createModel, 'name')?>

                            <?= $form->field($createModel, 'file')->widget(FileInput::className(), [
                                'language' => 'ru',
                                'options' => ['accept' => 'image/*'],
                                'pluginOptions' => [
                                    'showUpload' => false,
                                    'allowedFileExtensions'=>['jpg','gif','png']
                                ]
                            ])?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?= Yii::t('app', 'Close')?></button>
                            <?= Html::submitButton($createModel->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        </div>
    </div>
</div>

<div class="row">
<? foreach ($model as $item): ?>
    <div class="col-lg-4">
        <div class="portlet">
            <div class="portlet-heading bg-inverse">
                <div class="portlet-widgets">
                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                    <span class="divider"></span>
                    <a href="#" data-toggle="modal" data-target="#<?= $item->id?>"><i class="md md-create"></i></a>
                    <span class="divider"></span>
                    <a href="#" data-toggle="remove" data-id="<?= $item->id?>" class="remove"><i class="ion-close-round"></i></a>
                </div>

                <div class="clearfix"></div>
            </div>

            <div id="<?= $item->id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel"><?= $item->name?></h4>
                        </div>

                        <?php $form = ActiveForm::begin([
                            'options' =>
                                [
                                    'enctype' => 'multipart/form-data',
                                ],
                            'action'  => "/admin/group-exercise/update?id=$item->id",
                            'fieldConfig' => [
                                'template' => " <div class=\"form-group\"><label for=\"userName\">{label}</label>{input}<div class=\"col-lg-8\">{error}</div></div>",
                            ],
                        ]); ?>

                        <div class="modal-body">

                            <p class="text-muted font-13 m-b-30">
                                <?= Yii::t('app', 'Update exercise')?>
                            </p>

                            <?= $form->field($item, 'name')?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?= Yii::t('app', 'Close')?></button>
                            <?= Html::submitButton($item->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="panel panel-default">
                <a href="/admin/exercise/index?group_id=<?= $item->id?>">
                    <div class="panel-body">
                        <div class="p-20 images-exercise">
                            <? if($item->getImageFile()->path): ?>
                                <img src="<?= $item->getImageFile()->path?>" alt="image" class="img-responsive">
                            <? endif ?>
                        </div>
                    </div>
                </a>

                <div class="panel-heading">
                    <h3 class="panel-title"><?= $item->name?></h3>
                </div>
            </div>
        </div>
    </div>
<? endforeach; ?>
</div>
