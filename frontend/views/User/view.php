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
      ->select('excursion.excursion')
      ->from('token')
      ->innerJoin('excursion','token.id_excursion = excursion.id')
      ->where(['token.id_user' => Yii::$app->user->identity->id])
      ->all();


      foreach($tokenQuery as $key){
          echo $key['excursion'];
      }



//
//      $excQuery = (new Query())
//      ->select(['id', 'excursion'])
//      ->from('excursion')
//      ->where(['id' => $token])
//      ->all();
//
//      //var_dump($excQuery);
//      //var_dump($token['id_excursion']);
//
//      foreach($excQuery as $key){
//        //var_dump($key);
//          echo "<p>".$key['excursion']."</p>";
//      }

    ?>


</div>
