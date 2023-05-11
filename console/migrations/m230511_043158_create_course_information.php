<?php

use yii\db\Migration;

/**
 * Class m230511_043158_create_course_information
 */
class m230511_043158_create_course_information extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_information}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(500)->notNull(),
            'img' => $this->string(255)->notNull(),
            'course_time' => $this->integer()->notNull(),
            'course_price' => $this->integer()->notNull(),
            'background_color' => $this->string(255)->notNull(),
            'course_id' => $this->integer()->notNull(),
            'about_profession' => $this->text()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230511_043158_create_course_information cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230511_043158_create_course_information cannot be reverted.\n";

        return false;
    }
    */
}
