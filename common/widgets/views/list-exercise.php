<?

/**
 * @var $this \yii\web\View
 */

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\file\FileInput;

$this->registerAssetBundle(backend\assets\DropZoneAsset::className());

$this->registerJs("
    $('.remove').click(function(){

        var id = $(this).data('id');
        $.post(
            '/admin/exercise/delete',
            {id: id},
            function(data){

            }
        );
    });

");
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
                                        'id'    =>  'dropzone'
                                    ],
                                'action'  => "create",
                                'fieldConfig' => [
                                    'template' => " <div class=\"form-group\"><label for=\"userName\">{label}</label>{input}<div class=\"col-lg-8\">{error}</div></div>",
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
                                        'previewFileType' => 'jpg, jpeg, png',
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

    <div class="row">
        <div class="col-md-12">
            <div class="portlet">

                <div class="portlet-heading bg-inverse">
                    <h3 class="portlet-title"><?= $item->name?></h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="modal" data-target="#<?= $item->id?>"><i class="md md-create"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove" data-id="<?= $item->id?>" class="remove"><i class="ion-close-round"></i></a>
                        </div>
                    <div class="clearfix"></div>
                </div>

                <ul class="nav nav-tabs tabs">
                    <li class="active tab">
                        <a href="#home-2" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Description')?></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#profile-2" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Images')?></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#messages-2" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Youtube')?></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                            <span class="hidden-xs"><?= Yii::t('app', 'Muscle groups')?></span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home-2">

                        <div id="bg-default" class="panel-collapse collapse in">

                            <div class="portlet-body">
                                <?= $item->description?>
                            </div>

                            <!-- Personal-Information -->
                        </div>
                    </div>

                    <div class="tab-pane" id="profile-2">

                        <div class="p-20 images-exercise">
                            <? foreach($item->getImageFile() as $file): ?>
                                <div class="col-sm-4">
                                    <img src="<?= $file->path?>" alt="image" class="img-responsive">
                                </div>
                            <? endforeach; ?>
                        </div>

                    </div>

                    <div class="tab-pane" id="messages-2">

                        <div class="p-20">
                            <iframe  src="<?= $item->getYoutube()->link?>" frameborder="0" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="tab-pane" id="settings-2">
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
                                    ],
                                'action'  => "update?id=$item->id",
                                'fieldConfig' => [
                                    'template' => " <div class=\"form-group\"><label for=\"userName\">{label}</label>{input}<div class=\"col-lg-8\">{error}</div></div>",
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

                                <?= $form->field($item, 'files[]')->widget(FileInput::className(), [
                                    'language' => 'ru',
                                    'options' => ['multiple' => true],
                                    'pluginOptions' => [
                                        'showUpload' => false,
                                        'previewFileType' => 'jpg, jpeg, png',
                                    ]
                                ]); ?>

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