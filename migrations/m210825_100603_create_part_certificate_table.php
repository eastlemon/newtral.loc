<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%part_certificate}}`.
 */
class m210825_100603_create_part_certificate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%part_certificate}}', [
            'id' => $this->primaryKey(),
            'part_id' => $this->integer()->notNull(),
            'certificate_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-part_certificate-part_id',
            'part_certificate',
            'part_id',
            'part',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-part_certificate-certificate_id',
            'part_certificate',
            'certificate_id',
            'certificate',
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
            'fk-part_certificate-certificate_id',
            'part_certificate'
        );

        $this->dropForeignKey(
            'fk-part_certificate-part_id',
            'part_certificate'
        );

        $this->dropTable('{{%part_certificate}}');
    }
}
