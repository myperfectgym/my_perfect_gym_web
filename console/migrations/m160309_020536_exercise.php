<?php

use yii\db\Migration;

class m160309_020536_exercise extends Migration
{
    /*public function up()
    {
    }

    public function down()
    {
        echo "m160309_020536_exercise cannot be reverted.\n";

        return false;
    }*/


    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("CREATE TABLE links_video_from_youtube (
              id INT PRIMARY KEY AUTO_INCREMENT,
              name VARCHAR (255),
              modelname VARCHAR (255) NOT NULL,
              model_id INT NOT NULL,
              link VARCHAR (255)
        )");

        $this->execute("ALTER TABLE exercise DROP COLUMN link_to_youtoub,
                        ADD COLUMN chest INT,
                        ADD COLUMN back INT,
                        ADD COLUMN hips INT
        ");
    }

    public function safeDown()
    {
    }

}
