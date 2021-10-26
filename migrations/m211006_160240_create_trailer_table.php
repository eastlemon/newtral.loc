<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trailer}}`.
 */
class m211006_160240_create_trailer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trailer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'image' => $this->string()->defaultValue(null),
            'producer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-trailer-producer_id',
            'trailer',
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
            'fk-trailer-producer_id',
            'trailer'
        );

        $this->dropTable('{{%trailer}}');
    }
}
