<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Excursion */

$this->title = 'Create Excursion';
$this->params['breadcrumbs'][] = ['label' => 'Excursions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excursion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
