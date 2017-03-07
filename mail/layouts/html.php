<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta charset='utf-8' />
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>

</head>

<body style='margin:0;padding:0;'>

    <?php $this->beginBody() ?>
    
	<?= $content ?>
	
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
