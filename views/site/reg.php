<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация новых пользователей | '.Yii::$app->name;
?>

<div class="main_content">

<div class="site-login">
    <h1>Регистрация</h1>

    <p>Необходимо указать e-mail и пароль:</p>

	<?php if (Yii::$app->session->hasFlash('remind')): ?>
	  
	    <div class="alert alert-success">
            Новый пароль выслан на электронную почту
        </div>
		

    <?php endif; ?>
	
    <?php $form = ActiveForm::begin([
        'id' => 'loginform',
        'options' => [
		'class' => 'form-horizontal',
		],
        'fieldConfig' => [
            'template' => '{input}<label class="error">{error}</label>',
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'usermail')->textInput(['autofocus' => false,'placeholder'=>'E-mail','class'=>'lines'])->label(false) ?>

        <?= $form->field($model, 'userpass')->passwordInput(['autofocus' => false,'placeholder'=>'Пароль','class'=>'lines'])->label(false) ?>

	    <?= $form->field($model, 'url_string')->hiddenInput(['value'=> $_SERVER['REQUEST_URI']])->label(false) ?>

		<?= $form->field($model, 'act')->hiddenInput(['value'=> 'login'])->label(false) ?>		
		
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Войти в систему', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>

</div>