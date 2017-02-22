<?php

use yii\db\Migration;

class m170222_213409_start extends Migration
{
    public function up()
    {

  $sql = <<<SQL
	CREATE TABLE IF NOT EXISTS `blog_post` (
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
  

SQL;
    	$connection = Yii::$app->db; 
  	
    	$command = $connection->createCommand($sql);
    	$command -> execute();  
    }

    public function down()
    {
        echo "m170222_213409_start cannot be reverted.\n";

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
