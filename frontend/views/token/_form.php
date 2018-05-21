<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Excursion;
use kartik\date\DatePicker;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model common\models\Token */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="token-form">
    <?php Pjax::begin(['enablePushState' => true]); ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user',['template' => '{input}'])->hiddenInput() ?>

    
    <?= $form->field($model, 'id_excursion')->dropDownList(ArrayHelper::map(Excursion::find()->all(), 'id', 'excursion'),[
        'prompt' => 'Select Excursion',
        'onchange' => '
        $.post("../excursion/lists&id='.'"+$(this).val(), function( data ) { 
            $( "p.price" ).html( data );
        });'
        ]); ?>
    <p class="price"></p>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
                'pluginOptions' => [
                'forceParse' => 'false',
                'format' => 'yyyy-mm-dd',
                ]
    ])?>

    <?= $form->field($model, 'countMan')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'countChildren')->textInput(['data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'лица до 14 лет','type' => 'number']) ?>

    <?= $form->field($model, 'price')->hiddenInput(['value' => $price]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>
