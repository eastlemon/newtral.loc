<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mode}}`.
 */
class m211006_160155_create_mode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mode}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('mode', ['name' => 'Односкатные']);
        $this->insert('mode', ['name' => 'Двускатные']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mode}}');
    }
}
