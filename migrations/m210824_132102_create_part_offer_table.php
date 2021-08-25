<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%part_offer}}`.
 */
class m210824_132102_create_part_offer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%part_offer}}', [
            'id' => $this->primaryKey(),
            'price' => $this->decimal(10, 2)->notNull(),
            'part_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-part_offer-part_id',
            'part_offer',
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
            'fk-part_offer-part_id',
            'part_offer'
        );

        $this->dropTable('{{%part_offer}}');
    }
}
