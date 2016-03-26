<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Exercise');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/js/app.exercise-index.js', [
    'depends'  => [
        'yii\web\JqueryAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\IsotopeAsset',
        'frontend\assets\MagnificPopupAsset',
    ]
]);
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 ">
        <div class="portfolioFilter">
            <a href="#" data-filter="*" class="current"><?= Yii::t('app', 'All')?></a>
            <? foreach($groupExercise as $group): ?>
                <a href="#" data-filter=".<?= $group->id?>"><?= $group->name?></a>
            <? endforeach; ?>
        </div>
    </div>
</div>

<div class="row port">
    <div class="portfolioContainer">

        <? foreach($models as $item): ?>
        <div class="col-sm-6 col-lg-3 col-md-4 <?= $item->groupExercise->id ?>">
            <div class="gal-detail thumb">
                <a href="assets/images/gallery/1.jpg" class="image-popup" title="Screenshot-1">
                </a>
                <h4>Gallary Image</h4>
            </div>
        </div>
        <? endforeach ?>
    </div>
</div>
