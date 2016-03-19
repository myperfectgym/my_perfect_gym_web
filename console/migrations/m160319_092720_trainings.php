<?php

use yii\db\Migration;

class m160319_092720_trainings extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE trainings ADD COLUMN name VARCHAR (100)");
    }

    public function down()
    {
        echo "m160319_092720_trainings cannot be reverted.\n";

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
