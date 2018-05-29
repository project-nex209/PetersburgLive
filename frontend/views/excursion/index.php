<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Excursion */

$this->title = $model->excursion;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excursion-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'excursion',
            'position',
            [
                'attribute' => 'image',
                'value' => html::img('@web/'.$model->image,['width' => '200px']),
                'format' => 'html',
            ],
            'priceMan',
            'priceChildren',
        ],
    ]) ?>

</div>
