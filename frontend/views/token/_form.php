<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Excursion;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Token */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="token-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user',['template' => '{input}'])->hiddenInput() ?>

    
    <?= $form->field($model, 'excursion')->dropDownList(ArrayHelper::map(Excursion::find()->all(), 'excursion', 'excursion')) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
                'pluginOptions' => [
                'forceParse' => 'false',
                'format' => 'yyyy-mm-dd',
                ]
    ])?>

    <?= $form->field($model, 'countMan')->textInput() ?>

    <?= $form->field($model, 'countChildren')->textInput(['data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'лица до 14 лет']) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
