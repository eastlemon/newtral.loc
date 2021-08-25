<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%part_picture}}`.
 */
class m210824_132033_create_part_picture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%part_picture}}', [
            'id' => $this->primaryKey(),
            'picture' => $this->text()->notNull(),
            'part_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-part_picture-part_id',
            'part_picture',
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
            'fk-part_picture-part_id',
            'part_picture'
        );

        $this->dropTable('{{%part_picture}}');
    }
}
