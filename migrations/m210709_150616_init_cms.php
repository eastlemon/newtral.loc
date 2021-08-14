<?php

use yii\db\Migration;

/**
 * Class m210709_150616_init_cms
 */
class m210709_150616_init_cms extends Migration
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

        $this->createTable('{{%cms}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'markdown_content' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'comment_available' => $this->smallInteger()->notNull()->defaultValue(0),
            'meta_title' => $this->text()->notNull(),
            'meta_description' => $this->text(),
            'meta_keywords' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cms}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210709_150616_init_cms cannot be reverted.\n";

        return false;
    }
    */
}
