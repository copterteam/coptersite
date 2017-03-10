<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Войти';
?>

<div class="main_content">

<div class="site-login">
    <h1>Вход в систему</h1>

    <p>Для входа в систему укажите e-mail и пароль:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'loginform',
        'options' => [
		'class' => 'form-horizontal',
		],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'usermail')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'userpass')->passwordInput() ?>

	    <?= $form->field($model, 'url_string')->hiddenInput(['value'=> $_SERVER['REQUEST_URI']])->label(false) ?>

		<?= $form->field($model, 'act')->hiddenInput(['value'=> 'login'])->label(false) ?>		
		
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>

</div>