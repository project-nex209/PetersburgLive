<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\db\Query;
use common\models\Token;
use common\models\Excursion;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Yii::$app->user->identity->username ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            'date',
            'phone',
            //'family',
            //'children',
            //'isAdmin',
        ],
    ]) ?>

    <?php
      $tokenQuery = (new Query())
      ->select(['id', 'id_user', 'id_excursion', 'date', 'countMan', 'price'])
      ->from('token')
      ->where(['id_user' => $model->id])
      ->all();

      $token = ArrayHelper::map($tokenQuery, 'id', 'id_excursion');

        $array = ArrayHelper::map(Excursion::find(['id' => $token['id_excursion']])->all(), 'id', 'excursion');
    ?>


</div>
