<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attachment}}`.
 */
class m210709_151334_create_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%attachment}}', [
            'id' => $this->primaryKey(),
            'file_extension' => $this->string(),
            'file_version' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%attachment}}');
    }
}
