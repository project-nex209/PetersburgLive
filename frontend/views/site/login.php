<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните следующие поля, чтобы войти</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label("Email"); ?>

            <?= $form->field($model, 'password')->passwordInput()->label("Пароль"); ?>

            <?= $form->field($model, 'rememberMe')->checkbox()->label("Запомнить меня"); ?>

            <div style="color:#999;margin:1em 0">
               <?= Html::a('Забыли пароль', ['site/request-password-reset']) ?>.
            </div>

            <div class="form-group">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-2">
<script type="text/javascript" src="//vk.com/js/api/openapi.js?154"></script>
<script type="text/javascript">
  VK.init({apiId: 6485223});
</script>

<!-- VK Widget -->
<div id="vk_auth"></div>
<script type="text/javascript">
  VK.Widgets.Auth("vk_auth", {"authUrl":"/frontend/web/site/login-vk"});
</script>
        </div>

    </div>
</div>
