<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type}}`.
 */
class m211006_160207_create_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('type', ['name' => '---']);
        $this->insert('type', ['name' => 'Низкорамные']);
        $this->insert('type', ['name' => 'Высокорамные до 40тн.']);
        $this->insert('type', ['name' => 'Высокорамные от 40 до 50тн.']);
        $this->insert('type', ['name' => 'Высокорамные от 50 до 60тн.']);
        $this->insert('type', ['name' => 'Высокорамные от 60тн. и выше']);
        $this->insert('type', ['name' => 'Полуприцеп бортовой с раздвижными кониками']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type}}');
    }
}
