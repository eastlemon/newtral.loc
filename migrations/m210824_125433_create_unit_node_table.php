<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%unit_node}}`.
 */
class m210824_125433_create_unit_node_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%unit_node}}', [
            'id' => $this->primaryKey(),
            'unit_id' => $this->integer()->notNull(),
            'node_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-unit_node-unit_id',
            'unit_node',
            'unit_id',
            'unit',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-unit_node-node_id',
            'unit_node',
            'node_id',
            'node',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-unit_node-node_id',
            'unit_node'
        );

        $this->dropForeignKey(
            'fk-unit_node-unit_id',
            'unit_node'
        );

        $this->dropTable('{{%unit_node}}');
    }
}
