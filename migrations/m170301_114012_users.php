<?php

use yii\db\Migration;

class m170301_114012_users extends Migration
{
    public function up()
    {
		

  $sql = <<<SQL
  
  DROP TABlE `copterteam_users`;

SQL;
    	$connection = Yii::$app->db; 
  	
    	$command = $connection->createCommand($sql);
    	$command -> execute();  
  }

    public function down()
    {
        echo "m170301_114012_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}