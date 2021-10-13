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
            'image' => $this->string()->defaultValue(null),
            'markup' => $this->text()->defaultValue(null),
            'producer_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'mode_id' => $this->integer()->notNull(),
            'axis_id' => $this->integer()->notNull(),
            'chassis_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-trailer-chassis_id',
            'trailer',
            'chassis_id',
            'chassis',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-trailer-axis_id',
            'trailer',
            'axis_id',
            'axis',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-trailer-mode_id',
            'trailer',
            'mode_id',
            'mode',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-trailer-type_id',
            'trailer',
            'type_id',
            'type',
            'id',
            'CASCADE'
        );

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

        $this->dropForeignKey(
            'fk-trailer-type_id',
            'trailer'
        );

        $this->dropForeignKey(
            'fk-trailer-mode_id',
            'trailer'
        );

        $this->dropForeignKey(
            'fk-trailer-axis_id',
            'trailer'
        );

        $this->dropForeignKey(
            'fk-trailer-chassis_id',
            'trailer'
        );

        $this->dropTable('{{%trailer}}');
    }
}
