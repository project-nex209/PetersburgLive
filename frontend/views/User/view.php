<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;

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
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
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
            [
              'attribute' => 'token',
              'value' => function($model){
                $query = (new \yii\db\Query())
                ->select(['id', 'id_user', 'id_excursion', 'price'])
                ->from('token')
                ->where(['id_user' => $model->id])
                ->all();

                foreach($query as $key){
                  echo $key['price'];
                }
              },
            ],
            //'family',
            //'children',
            //'isAdmin',
        ],
    ]) ?>

</div>
