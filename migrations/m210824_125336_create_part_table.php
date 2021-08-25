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
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'articul' => $this->string()->notNull(),
            'description' => $this->text(),
            'producer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-part-producer_id',
            'part',
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

        $this->dropTable('{{%part}}');
    }
}
