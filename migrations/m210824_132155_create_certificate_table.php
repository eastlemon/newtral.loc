<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%certificate}}`.
 */
class m210824_132155_create_certificate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%certificate}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'file' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%certificate}}');
    }
}
