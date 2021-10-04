<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trailer}}`.
 */
class m210928_034246_create_trailer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trailer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('trailer', ['name' => 'Трейлер1']);
        $this->insert('trailer', ['name' => 'Трейлер2']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trailer}}');
    }
}
