<?

/**
* @var $item
 */

use yii\helpers\Html;
?>
<? foreach ($model as $item) : ?>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-heading portlet-default">
                    <h3 class="portlet-title text-dark"><?= $item->name?></h3>

                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="md md-create"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div id="bg-default" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <?= $item->description?>
                    </div>

                    <div class="portlet-body">
                        <button class="btn btn-success btn-custom waves-effect waves-light" data-toggle="modal" data-target="#myModal"><?= Yii::t('app', 'Video')?></button>
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $item->id], ['class' => 'btn btn-success btn-custom waves-effect waves-light'])?>
                    </div>
                </div>

                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?= Yii::t('app', 'Close')?></button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>

<? endforeach; ?>