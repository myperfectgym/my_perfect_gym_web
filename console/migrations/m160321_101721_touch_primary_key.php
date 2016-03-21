<?php

use yii\db\Migration;

class m160321_101721_touch_primary_key extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE touch ADD COLUMN id INT PRIMARY KEY AUTO_INCREMENT");
    }

    public function down()
    {
        echo "m160321_101721_touch_primary_key cannot be reverted.\n";

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
