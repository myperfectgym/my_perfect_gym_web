<?

/**
 * @var $this \yii\web\View
 */

use yii\helpers\Html;

$this->registerJsFile('/js/custom-widget/list-exercise.js', [

    'depends' => [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ]
])
?>
<? foreach ($model as $item) : ?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet">

            <div class="portlet-heading bg-inverse">
                <h3 class="portlet-title"><?= $item->name?></h3>

                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a href="update?id=<?= $item->id?>"><i class="md md-create"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove" data-id="<?= $item->id?>" class="remove"><i class="ion-close-round"></i></a>
                    </div>

                <div class="clearfix"></div>
            </div>

            <div id="bg-default" class="panel-collapse collapse in">

                <div class="portlet-body">
                    <?= $item->description?>
                </div>

                <div class="card-box">
                    <h4 class="portlet-title text-dark"><b><?= Yii::t('app', 'Muscle groups are involved')?></b></h4>

                    <div class="p-20">
                        <div class="m-b-15">
                            <h5><?= Yii::t('app', 'Chest')?><span class="pull-right">60%</span></h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>

                        <div class="m-b-15">
                            <h5><?= Yii::t('app', 'Back')?><span class="pull-right">90%</span></h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-pink wow animated progress-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                    <span class="sr-only">90% Complete</span>
                                </div>
                            </div>
                        </div>

                        <div class="m-b-15">
                            <h5><?= Yii::t('app', 'Hips')?><span class="pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-purple wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-20">
                    <iframe  src="https://www.youtube.com/embed/FH4hLcD1QJs?list=PLyfVjOYzujujcO-YwtS8xccCPz3UQzrCM" frameborder="0" allowfullscreen></iframe>
                </div>
                <!-- Personal-Information -->
            </div>
        </div>
    </div>
</div>

<? endforeach; ?>
