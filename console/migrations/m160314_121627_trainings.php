<?php

use yii\db\Migration;

class m160314_121627_trainings extends Migration
{
    /*
    public function up()
    {
    }

    public function down()
    {
    }
    */


    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("CREATE TABlE trainings_exercise (
              id INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
              trainings_id INT NOT NULL ,
              exercise_id INT NOT NULL ,
              FOREIGN KEY (trainings_id) REFERENCES trainings (id),
              FOREIGN KEY (exercise_id) REFERENCES exercise (id)
        )");

        $this->execute("CREATE TABLE touch (
              trainings_exercise_id INT NOT NULL ,
              number INT NOT NULL ,
              count INT NOT NULL ,
              weight INT NOT NULL ,
              FOREIGN KEY (trainings_exercise_id) REFERENCES trainings_exercise (id)
        )");

        $this->execute("ALTER TABLE exercise ADD COLUMN done TINYINT(1) DEFAULT NULL ");
    }

    public function safeDown()
    {
        $this->execute("DROP TABLE trainings_exercise");
        $this->execute("ALTER TABLE exercise DROP COLUMN done");
    }

}
