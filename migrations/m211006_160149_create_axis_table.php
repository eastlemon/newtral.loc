<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%axis}}`.
 */
class m211006_160149_create_axis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%axis}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('axis', ['name' => '---']);
        $this->insert('axis', ['name' => '2-х осные']);
        $this->insert('axis', ['name' => '3-х осные']);
        $this->insert('axis', ['name' => '4-х осные']);
        $this->insert('axis', ['name' => '5-ти осные']);
        $this->insert('axis', ['name' => '6-ти осные']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%axis}}');
    }
}
