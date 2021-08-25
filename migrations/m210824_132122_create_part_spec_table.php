<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%part_spec}}`.
 */
class m210824_132122_create_part_spec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%part_spec}}', [
            'id' => $this->primaryKey(),
            'param' => $this->text()->notNull(),
            'value' => $this->text()->notNull(),
            'part_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-part_spec-part_id',
            'part_spec',
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
            'fk-part_spec-part_id',
            'part_spec'
        );

        $this->dropTable('{{%part_spec}}');
    }
}
