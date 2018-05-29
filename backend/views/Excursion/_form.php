<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
/* @var $this yii\web\View */
/* @var $model common\models\Excursion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="excursion-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'excursion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    <?php //$model->image = UploadedFile::getInstance($model, 'image');
   // $model->upload();
    ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'priceMan')->textInput() ?>

    <?= $form->field($model, 'priceChildren')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
