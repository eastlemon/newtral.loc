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
            'position' => $this->text()->notNull(),
            'picture' => $this->text()->notNull(),
            'link' => $this->text()->notNull(),
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
