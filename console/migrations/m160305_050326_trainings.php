<?php

use yii\db\Migration;

class m160305_050326_trainings extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE trainings (
              id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
              user_id INT  NOT NULL,
              description TEXT,
              date DATE,
              FOREIGN KEY (user_id) REFERENCES user(id)
        )");
    }

    public function down()
    {
        $this->execute("DROP TABLE trainings");
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
