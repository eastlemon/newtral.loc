<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%part_analogue}}`.
 */
class m210827_085945_create_part_analogue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%part_analogue}}', [
            'id' => $this->primaryKey(),
            'part_id' => $this->integer()->notNull(),
            'part_id_analogue' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-part_analogue-part_id',
            'part_analogue',
            'part_id',
            'part',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-part_analogue-part_id_analogue',
            'part_analogue',
            'part_id_analogue',
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
            'fk-part_analogue-part_id_analogue',
            'part_analogue'
        );

        $this->dropForeignKey(
            'fk-part_analogue-part_id',
            'part_analogue'
        );

        $this->dropTable('{{%part_analogue}}');
    }
}
