<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorites}}`.
 */
class m210928_034419_create_favorites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favorites}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'part_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-favorites-user_id',
            'favorites',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-favorites-part_id',
            'favorites',
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
            'fk-favorites-part_id',
            'favorites'
        );

        $this->dropForeignKey(
            'fk-favorites-user_id',
            'favorites'
        );

        $this->dropTable('{{%favorites}}');
    }
}
