<?

/**
 * @var $this \yii\web\View
 */

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\file\FileInput;

$this->registerAssetBundle(backend\assets\DropZoneAsset::className());
$this->registerAssetBundle(common\assets\SweetAlert::className());

$this->registerJs("
    $('.remove-image').click(function(){

        var id = $(this).data('id');
        $.post(
            '/admin/exercise/delete-image',
            {id: id},
            function(data){

            }
        );
    });

    $('.remove').click(function(){
        var id = $(this).data('id');
        swal({
            title: '".Yii::t('app', 'Are you sure?')."',
            text: '".Yii::t('app', 'Exercise will be deleted')."',
            type: \"warning\",
            showCancelButton: true,
            confirmButtonColor: \"#DD6B55\",
            confirmButtonText: '".Yii::t('app', 'Yes, delete it!')."',
            cancelButtonText: '".Yii::t('app', 'No')."',
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {

                $.post(
                    '/admin/exercise/delete',
                    {id: id},
                    function(data){

                        $('#item-'+id).remove();
                    }
                );

                swal('".Yii::t('app', 'Deleted!')."', '', 'success');
            } else {
                swal('".Yii::t('app', 'Cancelled')."', '', 'error');
            }
        });
    });

");

foreach ($model as $item) {
    $this->registerJs("
        Dropzone.options.exerciseDropzone$item->id = {
            url: 'add-new-photo',
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 6,
            maxFiles: 6,
            maxFilesize: 10,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictDefaultMessage: '" . Yii::t('app', 'Drop files here to upload') . "',
            dictRemoveFile: '" . Yii::t('app', 'delete') . "',
            init: function() {
                var dzClosure  = this;

                $('#send-exercise-photo-$item->id').click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });

                this.on('sendingmultiple', function(data, xhr, formData) {
                    formData.append('_csrf', yii.getCsrfToken());
                    formData.append('id', $('#model-id-$item->id').val());
                });

            },
            success: function(file, response){

            }
        }
    ");
}
?>



<div class="row">
    <div class="card-box">
        <div class="row">
            <div class="col-sm12">

                <a href="#" data-toggle="modal" data-target="#create" class='btn btn-success btn-custom waves-effect waves-light'><?= Yii::t('app', 'Create Exercise')?></a>

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
                                        'id'    => 'create',
                                    ],
                                'action'  => "create",
                                'fieldConfig' => [
                                    'template' => " <div class=\"form-group\"><label>{label}</label>{input}<div class=\"col-lg-8\">{error}</div></div>",
                                ],
                            ]); ?>

                            <div class="modal-body">

                                <p class="text-muted font-13 m-b-30">
                                    <?= Yii::t('app', 'Create exercise')?>
                                </p>

                                <?= $form->field($createModel, 'group_id')->hiddenInput()->label("")?>

                                <?= $form->field($createModel, 'name')?>

                                <?= $form->field($createModel, 'description')->textarea()?>

                                <?= $form->field($createModel, 'chest')?>

                                <?= $form->field($createModel, 'back')?>

                                <?= $form->field($createModel, 'hips')?>

                                <?= $form->field($createModel, 'link_to_youtube')?>

                                <?= $form->field($createModel, 'files[]')->widget(FileInput::className(), [
                                    'language' => 'ru',
                                    'options' => ['multiple' => true],
                                    'pluginOptions' => [
                                        'showUpload' => false,
                                        'allowedFileExtensions'=>['jpg','gif','png']
                                    ]
                                ]); ?>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                    <?= Yii::t('app', 'Close')?>
                                </button>
                                <?= Html::submitButton(
                                    $createModel->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), [
                                    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                                    'id'    => 'button-send',
                                ]) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">

<? foreach ($model as $item) : ?>

    <div class="row" id="item-<?= $item->id?>">
        <div class="col-md-12">
            <div class="portlet">

                <div class="portlet-heading bg-inverse">
                    <h3 class="portlet-title"><?= $item->name?></h3>
                        <div class="portlet-widgets">
                            <span class="divider"></span>
                            <a href="#" data-toggle="modal" data-target="#<?= $item->id?>"><i class="md md-create"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-id="<?= $item->id?>" class="remove"><i class="ion-close-round"></i></a>
                        </div>
                    <div class="clearfix"></div>
                </div>

                <ul class="nav nav-tabs tabs">
                    <li class="active tab">
                        <a href="#description-<?= $item->id?>" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="md md-format-align-justify"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Description')?></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#image-<?= $item->id?>" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="md md-camera-alt"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Images')?></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#youtube-<?= $item->id?>" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="md md-videocam"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Youtube')?></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#muscle-groups-<?= $item->id?>" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="md md-trending-up"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Muscle groups')?></span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="description-<?= $item->id?>">

                        <div id="bg-default" class="panel-collapse collapse in">

                            <div class="portlet-body">
                                <?= $item->description?>
                            </div>

                            <!-- Personal-Information -->
                        </div>
                    </div>

                    <div class="tab-pane" id="image-<?= $item->id?>">

                        <div class="row">
                            <div class="col-md-12 portlets">
                                <!-- Your awesome content goes here -->
                                <div class="m-b-30">
                                    <input type="hidden" id="model-id-<?= $item->id?>" value="<?= $item->id?>">
                                    <div class="dropzone dz-clickable" id="exerciseDropzone<?= $item->id?>"></div>

                                    <div class="clearfix pull-right m-t-15">
                                        <button id="send-exercise-photo-<?= $item->id?>" type="button"
                                                class="btn btn-pink btn-rounded waves-effect waves-light">
                                            <?= Yii::t('app', 'Upload')?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-20 images-exercise">
                            <? foreach($item->getImageFile() as $file): ?>
                                <div class="col-sm-4">
                                    <div class="portlet image-portlet">
                                        <div class="portlet-heading portlet-default">
                                            <div class="portlet-widgets">
                                                <a href="#" data-toggle="remove" class="remove-image" data-id="<?= $file->id?>"><i class="ion-close-round"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <img src="<?= $file->path?>" alt="image" class="img-responsive img-rounded" height="200">
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>

                    </div>

                    <div class="tab-pane" id="youtube-<?= $item->id?>">

                        <div class="p-20 youtube-exercise">
                            <iframe class="col-sm-4" src="<?= $item->getYoutube()->link?>" frameborder="0" allowfullscreen>
                            </iframe>
                        </div>

                    </div>

                    <div class="tab-pane" id="muscle-groups-<?= $item->id?>">
                        <div class="p-20">
                            <div class="m-b-15">
                                <h5><?= Yii::t('app', 'Chest')?><span class="pull-right"><?= $item->chest?>%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="<?= $item->chest?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $item->chest?>%;">
                                        <span class="sr-only"><?= $item->chest?>% Complete</span>
                                    </div>
                                </div>
                            </div>

                            <div class="m-b-15">
                                <h5><?= Yii::t('app', 'Back')?><span class="pull-right"><?= $item->back?>%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-pink wow animated progress-animated" role="progressbar" aria-valuenow="<?= $item->back?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $item->back?>%;">
                                        <span class="sr-only"><?= $item->back?>% Complete</span>
                                    </div>
                                </div>
                            </div>

                            <div class="m-b-15">
                                <h5><?= Yii::t('app', 'Hips')?><span class="pull-right"><?= $item->hips?>%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-purple wow animated progress-animated" role="progressbar" aria-valuenow="<?= $item->hips?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $item->hips?>%;">
                                        <span class="sr-only"><?= $item->hips?>% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        'id'    => $item->id,
                                    ],
                                'action'  => "update?id=$item->id",
                                'fieldConfig' => [
                                    'template' => " <div class=\"form-group\"><label>{label}</label>{input}<div class=\"col-lg-8\">{error}</div></div>",
                                ],
                            ]); ?>

                            <div class="modal-body">

                                <p class="text-muted font-13 m-b-30">
                                    <?= Yii::t('app', 'Update exercise')?>
                                </p>

                                <?= $form->field($item, 'name')?>

                                <?= $form->field($item, 'description')->textarea()?>

                                <?= $form->field($item, 'chest')?>

                                <?= $form->field($item, 'back')?>

                                <?= $form->field($item, 'hips')?>

                                <?= $form->field($item, 'link_to_youtube')?>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?= Yii::t('app', 'Close')?></button>
                                <?= Html::submitButton($item->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

            </div>
        </div>
    </div>

<? endforeach; ?>

</div>