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
	
    <?php $form2 = ActiveForm::begin([
        'id' => 'regform',
        'options' => [
		'class' => 'form-horizontal',
		],
        'fieldConfig' => [
            'template' => '{input}<label class="error">{error}</label>',
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
        <?= $form2->field($model, 'url_string')->hiddenInput(['value'=> $_SERVER['REQUEST_URI']])->label(false) ?>

		<?if($model->scenario == 'begin'){?>
        
		<?= $form2->field($model, 'username')->textInput(['autofocus' => false,'placeholder'=>'Ваше имя','class'=>'lines'])->label(false) ?>
		<?= $form2->field($model, 'usermail')->textInput(['autofocus' => false,'placeholder'=>'E-mail','class'=>'lines'])->label(false) ?>



		<?= $form2->field($model, 'act')->hiddenInput(['value'=> 'begin'])->label(false) ?>		
		
		<? } if($model->scenario == 'registr'){ ?>
		
    	<?= $form2->field($model, 'username')->textInput(['autofocus' => false,'readonly'=>true,'placeholder'=>'Ваше имя','class'=>'lines'])->label(false) ?>
		<?= $form2->field($model, 'usermail')->textInput(['autofocus' => false,'readonly'=>true,'placeholder'=>'E-mail','class'=>'lines'])->label(false) ?>

		<?= $form2->field($model, 'actcode')->textInput(['autofocus' => true,'placeholder'=>'Код активации','class'=>'lines'])->label(false) ?>

        <?= $form2->field($model, 'userpass')->passwordInput(['autofocus' => false,'placeholder'=>'Пароль','class'=>'lines'])->label(false) ?>

        <?= $form2->field($model, 'userpass2')->passwordInput(['autofocus' => false,'placeholder'=>'Пароль еще раз','class'=>'lines'])->label(false) ?>

		<?= $form2->field($model, 'act')->hiddenInput(['value'=> 'registr'])->label(false) ?>		
				<?= $form2->field($model, 'mailcode')->hiddenInput()->label(false) ?>		

	
		<?}?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Войти в систему', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>

</div>