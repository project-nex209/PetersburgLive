<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Excursion */

$this->params['breadcrumbs'][] = ['label' => 'Экскурсии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->excursion;
?>
<div class="excursion-view">

    <h1><?= Html::encode($model->excursion) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'excursion',
            'position',
            'priceMan',
            'priceChildren',
        ],
    ]) ?>

</div>
