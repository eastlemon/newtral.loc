<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_trailer}}`.
 */
class m211006_162613_create_user_trailer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_trailer}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'trailer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-user_trailer-user_id',
            'user_trailer',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user_trailer-trailer_id',
            'user_trailer',
            'trailer_id',
            'trailer',
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
            'fk-user_trailer-trailer_id',
            'user_trailer'
        );
        
        $this->dropForeignKey(
            'fk-user_trailer-user_id',
            'user_trailer'
        );

        $this->dropTable('{{%user_trailer}}');
    }
}
