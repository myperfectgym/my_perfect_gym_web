<?
use yii\helpers\Html;
use common\models\Files;
use frontend\models\form\UserForm;
?>

<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- Logo container-->
            <div class="logo">
                <span><a href="/" class="logo">My perfect gim</span></a></span>
            </div>
            <!-- End Logo container-->

            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li>
                        <form role="search" class="navbar-left app-search pull-left hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true">
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

                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>
    <!-- End topbar -->

    <!-- Navbar Start -->
    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu" >
                        <a href="#"><?= Yii::t('app', 'Trainings')?></a>
                        <ul class="submenu">
                            <li><?= Html::a(Yii::t('app', 'List trainings'), ['trainings/'])?>
                         </ul>
                    </li>
                    <li class="has-submenu" >
                        <a href="#" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"><?= Yii::t('app', 'Exercise')?></a>
                        <ul class="submenu">
                            <li><?= Html::a(Yii::t('app', 'List exercise'), ['exercise/'])?>
                        </ul>
                    </li>
                    <li><a href="#">Диеты</a></li>
                    <li><a href="#">Диеты</a></li>
                    <li><a href="#">Диеты</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->