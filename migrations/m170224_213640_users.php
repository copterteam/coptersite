<?php

use yii\db\Migration;

class m170224_213640_users extends Migration
{
    public function up()
    {

  $sql = <<<SQL
	CREATE TABLE IF NOT EXISTS `copterteam_users` (
  `user_id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- »ндексы сохранЄнных таблиц
--

--
-- »ндексы таблицы `copterteam_users`
--
ALTER TABLE `copterteam_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT дл¤ сохранЄнных таблиц
--

--
-- AUTO_INCREMENT дл¤ таблицы `copterteam_users`
--
ALTER TABLE `copterteam_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
  

SQL;
    	$connection = Yii::$app->db; 
  	
    	$command = $connection->createCommand($sql);
    	$command -> execute();  
    }

    public function down()
    {
        echo "m170224_213640_users cannot be reverted.\n";

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
