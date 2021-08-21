<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210819_110655_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'articule' => $this->string(),
            'description' => $this->text(),
            'producer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-product-producer_id',
            'product',
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
            'fk-product-producer_id',
            'product'
        );

        $this->dropTable('{{%product}}');
    }
}
