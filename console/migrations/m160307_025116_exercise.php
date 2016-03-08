<?php

use yii\db\Migration;

class m160307_025116_exercise extends Migration
{
/*    public function up()
    {

    }

    public function down()
    {
        echo "m160307_025116_exercise cannot be reverted.\n";

        return false;
    }*/


    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("CREATE TABLE exercise (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR (255),
            description TEXT,
            link_to_youtoub VARCHAR (255)
        )");

        $this->execute("CREATE TABLE trainings_exercise (
                        training_id INT NOT NULL,
                        exercise_id INT NOT NULL,
                        FOREIGN KEY (training_id) REFERENCES trainings (id),
                        FOREIGN KEY (exercise_id) REFERENCES exercise (id)
        )");

    }

    public function safeDown()
    {
        $this->execute("ALTER TABLE trainings
                        DROP FOREIGN KEY trainings_ibfk_2,
                        DROP COLUMN exercise_id
        ");
        $this->execute("DROP TABLE exercise");
    }

}
