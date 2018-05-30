<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = "Редактирование профиля";
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['user/', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Настройки';
?>
<div class="user-update">

    <h1>Редактирование профиля</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
