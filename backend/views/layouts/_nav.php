<?
use yii\helpers\Html;
use common\models\Files;
use frontend\models\UserForm;
?>

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="has_sub">
                    <a href="#" class="waves-effect waves-light"><i class="ti-home"></i> <span> <?= Yii::t('app', 'Content')?> </span> </a>
                    <ul class="list-unstyled">
                        <li><?= Html::a(Yii::t('app', 'Exercise'), ['group-exercise/'])?></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>