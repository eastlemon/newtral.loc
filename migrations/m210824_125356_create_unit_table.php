<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%unit}}`.
 */
class m210824_125356_create_unit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%unit}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'articul' => $this->string()->notNull(),
            'description' => $this->text(),
            'category_id' => $this->integer()->notNull(),
            'producer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-unit-category_id',
            'unit',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-unit-producer_id',
            'unit',
            'producer_id',
            'producer',
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
            'fk-part-producer_id',
            'part'
        );

        $this->dropForeignKey(
            'fk-node-category_id',
            'node'
        );

        $this->dropTable('{{%unit}}');
    }
}
