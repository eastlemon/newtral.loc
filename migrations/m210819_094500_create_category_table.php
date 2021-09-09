<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m210819_094500_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'picture' => $this->string(),
            'is_popular' => $this->integer()->defaultValue(0),
            'parent_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk-category-parent_id',
            'category',
            'parent_id',
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
            'fk-category-parent_id',
            'category'
        );

        $this->dropTable('{{%category}}');
    }
}
