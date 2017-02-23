<?php

use yii\db\Migration;

class m170223_214302_table extends Migration
{
    public function up()
    {
    $sql = <<<SQL

	ALTER TABLE `blog_post` ADD `created_at` INT(11) NOT NULL AFTER `content`, ADD `updated_at` INT(11) NOT NULL AFTER `created_at`; 
SQL;
	
	 
	 
	 
    	$connection = Yii::$app->db; 
  	
    	$command = $connection->createCommand($sql);
    	$command -> execute();  
		
		}

    public function down()
    {
        echo "m170223_214302_table cannot be reverted.\n";

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
