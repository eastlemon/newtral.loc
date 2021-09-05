<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slide}}`.
 */
class m210904_075259_create_slide_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%slide}}', [
            'id' => $this->primaryKey(),
            'header' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'position' => $this->string()->notNull(),
            'picture' => $this->string()->notNull(),
            'link' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%slide}}');
    }
}
