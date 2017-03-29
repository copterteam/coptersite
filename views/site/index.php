<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Сообщество любителей квадрокоптеров и беспилотных дронов. Реальный опыт использования мультироторных систем. | COPTERTEAM.club ';
?>

<div class="main_content">

<div class="slide1">

   <h1 class="utp">Сообщество любителей<br/>коптеров и беспилотных дронов</h1>
	 <span class="utp mini">Реальный опыт использования квадрокоптеров, гексакоптеров и других мультироторных БПЛА</span>
<div class="blacktab">  
	 <ul>
     <li>Регистрация в системе позволяет:</li>
     <li>Комментировать материалы сайта</li>
     <li>Делать публикации в персональном блоге</li>
     <li>Общаться с другими членами клуба</li>
     <li>Участвовать в конкурсах на сайте</li>

  </ul>



    <div class="rightcolumn">
      <div class="beginform">
	  
	   <?php $form2 = ActiveForm::begin([
        'id' => 'beginform',
		'action' =>['/reg'],
        'options' => [
		'class' => 'form-horizontal',
		],
        'fieldConfig' => [
            'template' => '{input}<label class="error">{error}</label>',
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
        <?= $form2->field($model, 'url_string')->hiddenInput(['value'=> $_SERVER['REQUEST_URI']])->label(false) ?>

		        
		<?= $form2->field($model, 'username')->textInput(['autofocus' => false,'placeholder'=>'Ваше имя','class'=>'lines'])->label(false) ?>
		<?= $form2->field($model, 'usermail')->textInput(['autofocus' => false,'placeholder'=>'E-mail','class'=>'lines'])->label(false) ?>


		<?= $form2->field($model, 'act')->hiddenInput(['value'=> 'begin'])->label(false) ?>		
		
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Быстрая регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
	
	
       <!-- <form id="beginform">
	        <input type="text" name="username" placeholder="Ваше Имя">
		      <input type="text" name="usermail" placeholder="Ваш E-mail">
          <button type="submit">Быстрая регистрация</button>
	      </form>
        -->
 
		  <div class="cover"><img src="img/loading.gif"/></div>
      </div>
   </div>
  
  
    <div class="clearfix"></div>
  
 </div> 
  

</div>





 </div>
