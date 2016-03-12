<?php

use common\widgets\ListGroupExercise;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Exercises';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= ListGroupExercise::widget([
    'model' => $model,
])?>
