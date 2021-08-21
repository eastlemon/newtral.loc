<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%productpicture}}`.
 */
class m210820_052900_create_productpicture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%productpicture}}', [
            'id' => $this->primaryKey(),
            'picture' => $this->text(),
            'product_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-productpicture-product_id',
            'productpicture',
            'product_id',
            'product',
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
            'fk-productpicture-product_id',
            'productpicture'
        );

        $this->dropTable('{{%productpicture}}');
    }
}
