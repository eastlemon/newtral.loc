<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%node}}`.
 */
class m210824_125344_create_node_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%node}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'articul' => $this->string()->notNull(),
            'description' => $this->text(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-node-category_id',
            'node',
            'category_id',
            'category',
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
            'fk-node-category_id',
            'node'
        );

        $this->dropTable('{{%node}}');
    }
}
