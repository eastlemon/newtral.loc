<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%producer}}`.
 */
class m210819_110647_create_producer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%producer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%producer}}');
    }
}
