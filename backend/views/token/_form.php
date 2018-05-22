<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Excursion;
/* @var $this yii\web\View */
/* @var $model common\models\Token */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="token-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_excursion')->dropDownList(ArrayHelper::map(Excursion::find()->all(), 'id', 'id_excursion')) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'countMan')->textInput() ?>

    <?= $form->field($model, 'countChildren')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
