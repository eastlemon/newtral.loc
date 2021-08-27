<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%office}}`.
 */
class m210827_124759_create_office_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%office}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('office', ['name' => 'Челябинск']);
        $this->insert('office', ['name' => 'Усинск']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%office}}');
    }
}
