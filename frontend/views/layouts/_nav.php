<?
use yii\helpers\Html;
use common\models\Files;
use frontend\models\UserForm;
?>
<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left hidden-xs">
        <div class="text-center">
            <a href="/" class="logo">
                <span>My perfect gim</span>
            </a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">

                <ul class="nav navbar-nav main-menu">
                    <li class="dropdown" >
                        <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"><?= Yii::t('app', 'Trainings')?></a>
                        <ul class="dropdown-menu">
                            <li><?= Html::a(Yii::t('app', 'List trainings'), ['trainings/'])?>
                            <li><?= Html::a(Yii::t('app', 'Create training'), ['trainings/create'])?></li>
                        </ul>
                    </li>
                    <li class="dropdown" >
                        <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"><?= Yii::t('app', 'Exercise')?></a>
                        <ul class="dropdown-menu">
                            <li><?= Html::a(Yii::t('app', 'List exercise'), ['exercise/'])?>
                        </ul>
                    </li>
                    <li><a href="#">Диеты</a></li>
                    <li><a href="#">Диеты</a></li>
                    <li><a href="#">Диеты</a></li>
                </ul>

                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>

                <ul class="nav navbar-nav navbar-right pull-right avatar">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true">
                            <?
                            $avatar = Files::find()
                                ->where(
                                    [
                                        'model_id' => Yii::$app->user->identity->id,
                                        'modelname' => UserForm::className(),
                                    ]
                                )
                                ->one();
                            if ($avatar): ?>
                                <img src="<?= $avatar->path?>" alt="user-img" class="img-circle">
                            <? else: ?>
                                <img src="/images/noavatar.png" alt="user-img" class="img-circle">
                            <? endif ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><?= Html::a(Yii::t('app', 'Profile'), ['user/view', 'id' => Yii::$app->user->identity->id])?></li>
                            <li><?= Html::a(Yii::t('app', 'Settings'), ['user/update', 'id' => Yii::$app->user->identity->id])?></li>
                            <li><?= Html::a(Yii::t('app', 'Logout'), ['site/logout', 'id' => Yii::$app->user->identity->id])?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->

<!--<div class="left side-menu">-->
<!--    <div class="sidebar-inner slimscrollleft">-->
<!--        <!--- Divider -->-->
<!--        <div id="sidebar-menu">-->
<!--            <ul>-->
<!---->
<!--                <li class="has_sub">-->
<!--                    <a href="#" class="waves-effect waves-light"><i class="ti-home"></i> <span> Календарь тренеровок </span> </a>-->
<!--                    <ul class="list-unstyled">-->
<!--                        <li><a href="trainings/calendar"> Календарь </a></li>-->
<!--                        <li><a href="dashboard_2.html"> Прогресс в упражнениях </a></li>-->
<!--                        <li><a href="dashboard_3.html"> Составление новых тренеровак </a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!---->
<!--            </ul>-->
<!--            <div class="clearfix"></div>-->
<!--        </div>-->
<!--        <div class="clearfix"></div>-->
<!--    </div>-->
<!--</div>-->
<!-- Left Sidebar End -->
