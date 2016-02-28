<?php

use yii\db\Migration;

class m160227_230737_file extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE files (
            id INT PRIMARY KEY AUTO_INCREMENT,
            filename VARCHAR (100) NOT NULL,
            path VARCHAR (100) NOT NULL,
            modelname VARCHAR(100) NOT NULL,
            model_id INT
        )");
    }

    public function down()
    {
        $this->execute("DROP TABLE files");
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
