<?php
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\User $user ;
 */
?>

 <div style='margin:0;padding:5px;width:100%;background:url(http://club.copterteam.ru/img/linen.png) left top repeat rgb(40,40,40);min-height:300px;'>
	   
	   <div class='header-content' style='max-width:600px;height:68px;margin:0px auto;margin-top:50px;border-bottom:1px solid rgb(40,40,40);font-family:Ubuntu,Tahoma,sans-serif;background-color:#FFF;'>
          <a href='http://www.copterteam.ru'><img src='http://www.copterteam.ru/img/r3logo.png' style='float:left;width:50px;height:50px;margin-top:9px;margin-left:40px;margin-right:30px;' />
		  <span style='float:left;display:inline-block;position:relative;margin-top:21px;margin-left:0px;font-size:21px;letter-spacing:1px;color:rgb(30,30,40);text-transform:uppercase;font-weight:bold;'>Copterteam
		  </span></a>
		  </div>
	   <div style='max-width:600px;margin:0px auto;font-family:Ubuntu,Tahoma,sans-serif;background-color:#FFF;'>
	    <div style='padding:50px;font-size:15px;line-height:30px;'>
		 Здравствуйте! <br/>По заявке с сайта COPTERTEAM.ru высылаем Вам код для завершения регистрации в системе. Скопируйте его и вставьте в соответствующее поле в форме регистрации на сайте.
          <br/>Код подтверждения: 
	      <span style='display:block;width:150px;margin:50px auto;padding:20px;text-align:center;background-color:#FFF;color:rgb(37,37,37); font-size:33px;border-bottom:1px solid rgb(40,40,40);'><?= $actcode ?></span>
          <div style='text-align:right;font-size:15px;'>С уважением, команда COPTERTEAM.<br/><a href='mailto:info@copterteam.ru'>info@copterteam.ru</a><br/><a href='http://www.copterteam.ru'>http://www.copterteam.ru</a> </div>       
		</div>
	   </div>
	   <div style='max-width:600px;margin:0px auto;margin-bottom:70px;border-top:1px solid rgb(40,40,40);font-family:Ubuntu,Tahoma,sans-serif;text-align:center;font-size:15px;background-color:#FFF;line-height:50px;'>
	   Это письмо отправлено автоматически. Отвечать на него не требуется.
	   </div>
	</div>
	