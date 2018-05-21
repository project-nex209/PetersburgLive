<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput()->label("Ф.И.О пользователя") ?>
    <?= $form->field($model, 'newPassword')->passwordInput()->label("Новый пароль")?>
    <?= $form->field($model, 'email')->label("Электронная почта")?>
    <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+7 (999) 999-99-99' , 'type' => 'integer'])->textInput()->label("Номер телефона"); ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
