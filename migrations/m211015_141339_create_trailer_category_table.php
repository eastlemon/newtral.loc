<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trailer_category}}`.
 */
class m211015_141339_create_trailer_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trailer_category}}', [
            'id' => $this->primaryKey(),
            'num' => $this->integer()->notNull(),
            'trailer_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-trailer_category-trailer_id',
            'trailer_category',
            'trailer_id',
            'trailer',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-trailer_category-category_id',
            'trailer_category',
            'category_id',
            'category',
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
            'fk-trailer_category-category_id',
            'trailer_category'
        );

        $this->dropForeignKey(
            'fk-trailer_category-trailer_id',
            'trailer_category'
        );
        
        $this->dropTable('{{%trailer_category}}');
    }
}
