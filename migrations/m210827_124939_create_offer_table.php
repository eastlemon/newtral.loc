<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%offer}}`.
 */
class m210827_124939_create_offer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%offer}}', [
            'id' => $this->primaryKey(),
            'amount' => $this->integer(),
            'price' => $this->decimal(10,2)->notNull(),
            'part_id' => $this->integer()->notNull(),
            'store_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-offer-part_id',
            'offer',
            'part_id',
            'part',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-offer-store_id',
            'offer',
            'store_id',
            'store',
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
            'fk-offer-store_id',
            'offer'
        );

        $this->dropForeignKey(
            'fk-offer-part_id',
            'offer'
        );

        $this->dropTable('{{%offer}}');
    }
}
