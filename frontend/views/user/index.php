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
$this->params['breadcrumbs'][] = $this->title;

$tokenQuery = (new Query())
                ->from('excursion')
                ->innerJoin('token','excursion.id = token.id_excursion' )
                ->where(['token.id_user' => $model->id])
                ->all();
?>
<div class="user-view">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 toppad" >
          <div class="panel panel-info border-0">
            <div class="panel-heading bg-light border-0">
              <h3 class="panel-title text-dark p-2"><?=$model->username?></h3>
              <span class="p-2">
                  <?= Html::a('Настройки', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-danger']) ?>
 
              </span>
            </div>
            <div class="mt-5">
              <div class="row">
                <div class="div_user col-md-12 col-lg-12 ">
                  <table class="table table-user-information col-sm-12 col-md-9 col-lg-9">
                    <tbody>
                      <tr>
                        <td>ФИО</td>
                        <td><?= $model->username ?></td>
                      </tr>
                      <tr>
                        <td>Дата рождения</td>
                        <td><?= $model->date ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?= $model->email ?></td>
                      </tr>
                      <tr>
                        <td>Контактный номер</td>
                        <td><?= $model->phone ?></td>
                      </tr>
                      <tr>
                        <td>Экскурсии</td>
                        <td><?php 
                        foreach($tokenQuery as $key) {
                            echo "<a href='../token/view?id={$key['id']}'>".$key['excursion']."</a><br>";                
                        }
                        ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="img_user col-sm-6 col-md-6 col-lg-3" align="center"><?= HTML::img('@web/'.$model->photo, ['class' => 'img-responsive']) ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
//    DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            //'id',
//            'username',
//            //'auth_key',
//            //'password_hash',
//            //'password_reset_token',
//            'email:email',
  //          //'status',
//            //'created_at',
//            //'updated_at',
//            'date',
//            'phone',

//            [
//                'attribute' => 'token',
//                'value' => function() {
//                    $tokens = Token::find()
//                            ->where(['id_user' => Yii::$app->user->identity->id])
//                            ->all();

//                    $token = [];
//                    foreach ($tokens as $tok) {
//
//                        $token[$tok->id] = [
//                            "excursion" => $tok->id_excursion,
//                            "date" => $tok->date,
//                            "price" => $tok->price
//                        ];
//                    }

//                },
//            ],
        //'family',
        //'children',
        //'isAdmin',

//        ],
//    ])
    ?>

</div>