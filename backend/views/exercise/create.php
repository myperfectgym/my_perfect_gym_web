<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Exercise */

$this->title = 'Create Exercise';
$this->params['breadcrumbs'][] = ['label' => 'Exercises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-6">
        <div class="card-box">

            <h4 class="m-t-0 header-title"><b><?= Html::encode($this->title) ?></b></h4>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>

