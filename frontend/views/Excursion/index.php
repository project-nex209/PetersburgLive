<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Excursions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excursion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Excursion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'excursion',
            'position',
            'priceMan',
            'priceChildren',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
