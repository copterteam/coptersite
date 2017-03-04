<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Copterteam',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/index']],
            ['label' => 'О нас', 'url' => ['/about']],
			['label' => 'Продукты', 'url' => ['/products']],
			['label' => 'Блог', 'url' => ['/blog']],
            ['label' => 'Контакты', 'url' => ['/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Личный кабинет', 'url' => ['/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			'homeLink' => ['label'=>'Главная','url'=>'/']
        ]) ?>
        <?= $content ?>
    </div>
</div>

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
