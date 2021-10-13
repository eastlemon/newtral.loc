<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chassis}}`.
 */
class m211006_160224_create_chassis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chassis}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string()->defaultValue(null),
        ]);

        $this->insert('chassis', ['name' => '---']);
        $this->insert('chassis', ['name' => 'Пневматическая']);
        $this->insert('chassis', ['name' => 'Рессорная (рессорно-балансирная)']);
        $this->insert('chassis', ['name' => 'Балансирная']);
        $this->insert('chassis', ['name' => 'W-агрегат (мост)']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chassis}}');
    }
}
