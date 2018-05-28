<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Token */

$this->title = 'Create Token';
$this->params['breadcrumbs'][] = ['label' => 'Tokens', 'url' => ['index']];

?>
<div class="token-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
