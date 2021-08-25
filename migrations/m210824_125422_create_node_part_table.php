<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%node_part}}`.
 */
class m210824_125422_create_node_part_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%node_part}}', [
            'id' => $this->primaryKey(),
            'node_id' => $this->integer()->notNull(),
            'part_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-node_part-node_id',
            'node_part',
            'node_id',
            'node',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-node_part-part_id',
            'node_part',
            'part_id',
            'part',
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
            'fk-node_part-part_id',
            'node_part'
        );

        $this->dropForeignKey(
            'fk-node_part-node_id',
            'node_part'
        );

        $this->dropTable('{{%node_part}}');
    }
}
