<?php

use yii\helpers\Html;
use common\widgets\ListExercise;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Exercises');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="row">
        <div class="card-box">
            <div class="row">
                <div class="col-sm12">
                    <h4 class="page-title"><?= Html::encode($this->title) ?></h4>
                </div>
            </div>
        </div>
    </div>

    <?= ListExercise::widget([
        'model' => $model,
        'group_id' => $group_id,
    ])?>

</div>

