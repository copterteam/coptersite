<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div id="cover"></div>

<?if(Yii::$app->user->isGuest){ ?>


<header>
<div class="header-content" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">

<a itemprop="url" href="http://www.copterteam.ru">
<figure class="logo" itemprop="logo" itemscope itemtype="http://schema.org/ImageObject" >
<img itemprop="url" itemprop="contentUrl" src="/img/r3logo.png">
</figure>
<span class="logoname" itemprop="name">Copterteam<em>.club</em></span>
</a>

<div id="login_but" data-from="<?echo($_SERVER['REQUEST_URI']);?>" >Вход в систему</div>

<div class="search_tab">
<form id="top_search" method="post" action="/">
<input type="hidden" name="refer" value="<?echo($_SERVER['REQUEST_URI']);?>" />
<input type="text" name="keywords" placeholder="Поиск..." />
<button></button>
</form>
</div>


</div>
<div class="clearfix"></div>
<div class="login_space">

   <?php 
   
   $model =  Yii::$app->controller->loginForm;
   
   $form = ActiveForm::begin([
        'action' =>['/login'],
        'id' => 'loginform',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => '{input}<label class="error">{error}</label>',
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'usermail')->textInput(['autofocus' => false,'placeholder'=>'E-mail','class'=>'lines'])->label(false) ?>

        <?= $form->field($model, 'userpass')->passwordInput(['autofocus' => false,'placeholder'=>'Пароль','class'=>'lines'])->label(false) ?>

		<?= $form->field($model, 'url_string')->hiddenInput(['value'=> $_SERVER['REQUEST_URI']])->label(false) ?>

		<?= $form->field($model, 'act')->hiddenInput(['value'=> 'login'])->label(false) ?>		
				
        <?= Html::submitButton('Вход в систему', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>


    <?php ActiveForm::end(); ?>
	

 
 <div class="form_links">
  <a href="/" id="remind">Забыли пароль?</a>
  <a href="/reg">Регистрация</a>
  
   <div class="form_desc">
    <span class="begin">Для входа в систему укажите e-mail адрес и пароль. Если Вы не помните пароль, нажмите на ссылку сверху.</span>
	<span class="stop">Неверное сочетание электронной почты и пароля! Пожалуйста, повторите попытку или воспользуйтесь функцией сброса пароля.</span>
	<span class="retry">Укажите в первом поле E-mail, для которого требуется восстановить пароль. На этот адрес электронной почты будет выслан новый пароль.</span>
	<span class="404">Указанный адрес электронной почты не был зарегистрирован на сайте! Перейдите к форме регистрации по ссылке сверху.</span>
	<span class="reset">На указанный адрес электронной почты был выслан новый пароль для сайта. Проверьте почту и используйте его для входа.</span>

	</div>
   </div>

 
</div>
</header>

<?}else{
	
	$user = app\models\User::findIdentity(Yii::$app->user->id);
	
	?>


<header>
<div class="header-content"  itemprop="publisher"  itemscope itemtype="http://schema.org/Organization">

<a itemprop="url" href="http://www.copterteam.ru">
<figure class="logo" itemprop="logo" itemscope itemtype="http://schema.org/ImageObject" >
<img itemprop="contentUrl" itemprop="url" src="/img/r3logo.png">
</figure>
<span class="logoname" itemprop="name">Copterteam<em>.club</em></span>
</a>

<div class="log_info">
<span><?= $user->username ?></span>
<span class="light"><?= $user->usermail ?></span>
<a href="/logout"><img id="log_out" src="/img/logout.png" title="Выйти"/></a>
</div>

<div class="search_tab">
<form id="top_search" method="post" action="/">
<input type="hidden" name="refer" value="<?echo($_SERVER['REQUEST_URI']);?>" />
<input type="text" name="keywords" placeholder="Поиск..." />
<button></button>
</form>
</div>

<?if(!$user->usernick){ ?> <a href="/edit_profile" class="empty" id="user_profile">  
<? } else {  ?>                 <a href="/users/<?= $user->usernick ?>" id="user_profile"> 
<?}?>
<div class="profile_info" >
<span>Мой профиль</span><br>
<span class="nick light"><?= $user->usernick ?></span>
<img id="avatar" src="<?= $user->avaFile ?>" />
</div>
</a>

</div>
</header>

<?}?>

   <?= $content ?>
   
   
<footer>
	  <img src="/img/scroll.png" id="scroll_top">

      <div class="sitemap">
        
		 <div id="vk_groups"></div>
	
		
			<div class="maplinks">
												
				<div class="jet left">COPTERTEAM club<br/>
				Россия, Санкт-Петербург<br/>
				E-mail: info@copterteam.ru<br/>
				URL: http://www.copterteam.ru</div><br/>
       
			  <a>Политика конфиденциальности</a><br/>	
			   <a>Правила публикации на сайте</a>	
              
			</div>
	  
				  <div class="maplinks">
				 <a href="/">Главная</a>
				 <a href="/">Поиск</a>
				 <a href="/">Новые записи</a>
				 <a href="/">Статьи</a>
				 <a href="/users/">Участники</a>
			     <a itemprop="mainEntityOfPage" id="getlink" href="http://www.copterteam.ru<?echo($_SERVER['REQUEST_URI']);?>">Ссылка</a>
				 
				 <br><div class="jet">COPTERTEAM - Член экспертной группы MACS (Modern Aerial Copter Solutions). <br/>Зарегистрированный товарный знак. <br/>Все права защищены.</div>
			   
				 </div>
				
	
	  
	  
      
	  
	  </div>
			  	<div class="clearfix"></div>

       
			 
      <div class="devider"></div>
      <div class="copyright">
 
      </div>
	 </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
