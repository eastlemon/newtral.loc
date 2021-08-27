<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%office_store}}`.
 */
class m210827_124809_create_office_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%office_store}}', [
            'id' => $this->primaryKey(),
            'delivery' => $this->integer()->notNull(),
            'office_id' => $this->integer()->notNull(),
            'store_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-office_store-office_id',
            'office_store',
            'office_id',
            'office',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-office_store-store_id',
            'office_store',
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
            'fk-office_store-store_id',
            'office_store'
        );

        $this->dropForeignKey(
            'fk-office_store-office_id',
            'office_store'
        );

        $this->dropTable('{{%office_store}}');
    }
}
