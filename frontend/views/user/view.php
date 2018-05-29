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
    <?=
    DetailView::widget([
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
//            [
//                'attribute' => 'token',
//                'value' => function() {
//                    $tokens = Token::find()
//                            ->where(['id_user' => Yii::$app->user->identity->id])
//                            ->all();
//
//                    $token = [];
//                    foreach ($tokens as $tok) {
//
//                        $token[$tok->id] = [
//                            "excursion" => $tok->id_excursion,
//                            "date" => $tok->date,
//                            "price" => $tok->price
//                        ];
//                    }
//                    
//                },
//            ],
        //'family',
        //'children',
        //'isAdmin',
        ],
    ])
    ?>
    <?php 
//     $tokenQuery = (new Query())
//                ->select('excursion.excursion, token.price')
//                ->from('token')
//                ->innerJoin('excursion','token.id_excursion = excursion.id')
//                ->where(['token.id_user' => Yii::$app->user->identity->id])
//                ->all();
//                foreach($tokenQuery as $key){
//                    return json_encode($key);
    ?>


</div>
