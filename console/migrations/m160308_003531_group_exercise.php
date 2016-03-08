<?php

use yii\db\Migration;

class m160308_003531_group_exercise extends Migration
{
    /* public function up()
    {

    }

    public function down()
    {
        echo "m160308_003531_group_exercise cannot be reverted.\n";

        return false;
    }*/


    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("CREATE TABLE group_exercise (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        name VARCHAR (255)
        )");

        $this->execute("ALTER TABLE exercise ADD COLUMN group_id INT,
                        ADD FOREIGN KEY (group_id) REFERENCES group_exercise (id)
        ");
    }

    public function safeDown()
    {
    }
}
