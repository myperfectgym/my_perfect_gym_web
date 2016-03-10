<?php

use yii\db\Migration;

class m160310_194943_exercise extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE exercise ALTER COLUMN chest SET DEFAULT 1,
                        ALTER COLUMN back SET DEFAULT 1,
                        ALTER COLUMN hips SET DEFAULT 1
        ");
    }

    public function down()
    {
        return true;
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
