<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GroupExercise */

$this->title = 'Create Group Exercise';
$this->params['breadcrumbs'][] = ['label' => 'Group Exercises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-exercise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
