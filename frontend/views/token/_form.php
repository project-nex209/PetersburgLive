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
        <?php
$script = <<< JS
    $('input,select').on('input keyup', function(e) {
        $.post("../excursion/lists?id="+$("#token-id_excursion").val(), function( data ) {
            let count = $("#token-countman").val();
            $( "#token-price" ).val( data * count );
            $( "#token-price-view" ).html( data * count );
    })})

JS;
    $this->registerJs($script, yii\web\View::POS_READY);
    ?>

    <?= $form->field($model, 'id_user',['template' => '{input}'])->hiddenInput(['value' => Yii::$app->user->identity->id]) ?>

    
    <?= $form->field($model, 'id_excursion')->dropDownList(ArrayHelper::map(Excursion::find()->all(), 'id', 'excursion'),[
        'prompt' => 'Select Excursion'
        ]); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
                'pluginOptions' => [
                'forceParse' => 'false',
                'format' => 'yyyy-mm-dd hh:ii',
                ]
    ])?>

    <?= $form->field($model, 'countMan')->textInput(['type' => 'number','min' => 0]) ?>

    <?php //= $form->field($model, 'countChildren')->textInput(['data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'лица до 14 лет','type' => 'number']) ?>
    
    
    <p>Цена:<span id="token-price-view">0</span></p>
    <?= $form->field($model, 'price',['template' => '{input}'])->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>
