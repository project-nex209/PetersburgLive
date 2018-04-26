<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Excursion */

$this->title = 'Update Excursion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Excursions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="excursion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
