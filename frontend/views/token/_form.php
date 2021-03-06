<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Excursion;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Token */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="token-form col-lg-5">
    <?php $form = ActiveForm::begin(); ?>
        <?php
$script = <<< JS

        $("#token-id_excursion").val(function() {
            return {$_GET['id']};
        });
    
    $('input,select').on('input keyup', function(e) {
        $.post("excursion/lists?id="+$("#token-id_excursion").val(), function( data ) {
            let obj = $.parseJSON( data );
        
            let man = obj[$("#token-id_excursion").val()].priceMan;
            let children = obj[$("#token-id_excursion").val()].priceChildren;
        
            let countm = $("#token-countman").val();
            let countc = $("#token-countchildren").val();
        
            $( "#token-price" ).val( man * countm  + children * countc);
            $( "#token-price-view" ).html( man * countm + children * countc);
    })})

JS;
    $this->registerJs($script, yii\web\View::POS_READY);
    ?>

    <?= $form->field($model, 'id_user',['template' => '{input}'])->hiddenInput(['value' => Yii::$app->user->identity->id]) ?>

    
    <?= $form->field($model, 'id_excursion')->dropDownList(ArrayHelper::map(Excursion::find()->all(), 'id', 'excursion'),[
        'prompt' => 'Выберите экскурсию'
        ]); ?>
    

    <?= $form->field($model, 'date')->widget(DateTimePicker::className(), [
                'options' => ['placeholder' => 'Дата проведения экускурсии'],
                'convertFormat' => true,
                'pluginOptions' => [
                'format' => 'yyyy-M-d H:i:s',
                'todayHighlight' => true
                ]
        ]);
    ?>

    <?= $form->field($model, 'countMan')->textInput(['type' => 'number','min' => 0]); ?>

    <?= $form->field($model, 'countChildren')->textInput(['data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'лица до 14 лет','type' => 'number','min' => 0]); ?>
    
    
    <h1>Цена: <span id="token-price-view">0</span></h1>
    <?= $form->field($model, 'price',['template' => '{input}'])->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Оформить', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
