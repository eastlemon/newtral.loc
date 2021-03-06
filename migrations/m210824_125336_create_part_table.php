<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%part}}`.
 */
class m210824_125336_create_part_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%part}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'slug' => $this->string()->notNull(),
            'articul' => $this->string()->notNull(),
            'description' => $this->text(),
            'producer_id' => $this->integer()->notNull(),
            'original_id' => $this->integer(),
            'created_at' => $this->string()->notNull(),
            'updated_at' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-part-producer_id',
            'part',
            'producer_id',
            'producer',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-part-original_id',
            'part',
            'original_id',
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
            'fk-part-original_id',
            'part'
        );

        $this->dropForeignKey(
            'fk-part-producer_id',
            'part'
        );

        $this->dropTable('{{%part}}');
    }
}
