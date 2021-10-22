<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chassis_producer}}`.
 */
class m211022_133249_create_chassis_producer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chassis_producer}}', [
            'id' => $this->primaryKey(),
            'chassis_id' => $this->integer()->notNull(),
            'producer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-chassis_producer-chassis_id',
            'chassis_producer',
            'chassis_id',
            'chassis',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-chassis_producer-producer_id',
            'chassis_producer',
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
            'fk-chassis_producer-producer_id',
            'chassis_producer'
        );

        $this->dropForeignKey(
            'fk-chassis_producer-chassis_id',
            'chassis_producer'
        );

        $this->dropTable('{{%chassis_producer}}');
    }
}
