<?php

use common\widgets\ListGroupExercise;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Exercises';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <?= Html::a(Yii::t('app', 'Create group exercise'), ['create'], ['class' => 'btn btn-success btn-custom waves-effect waves-light']) ?>
        </div>
    </div>
</div>

<div class="row">
    <?= ListGroupExercise::widget([
        'model' => $model,
    ])?>
</div>
