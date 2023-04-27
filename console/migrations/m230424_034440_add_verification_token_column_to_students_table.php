<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%students}}`.
 */
class m230424_034440_add_verification_token_column_to_students_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%students}}', 'verification_token', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%students}}', 'verification_token');
    }
}
