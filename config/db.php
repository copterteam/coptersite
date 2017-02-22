<?php
if (YII_ENV_DEV) {
	
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=copterteam',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];	
	
	
}else{
	
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=u61668_copterteam',
    'username' => 'u61668',
    'password' => 'tip9tnxyw4',
    'charset' => 'utf8',
];

}
