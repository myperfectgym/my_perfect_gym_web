<?
use yii\helpers\Html;
use common\models\Files;
use frontend\models\UserForm;
?>

<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>My perfect gym</span></a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="ion-navicon"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>


                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown">
                        <a href="/"><?= Yii::t('app', 'Site')?></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="has_sub">
                    <a href="#" class="waves-effect waves-light"><i class="md md-content-paste"></i> <span> <?= Yii::t('app', 'Content')?> </span> </a>
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