<?php

use yii\db\Migration;

/**
 * Class m180718_101712_news
 */
class m180718_101712_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(1024)->notNull(),
            'title' => $this->string(512)->notNull(),
            'text' => $this->text()->notNull(),
            'prev_text' => $this->text()->notNull(),
            'image' => $this->text()->notNull(),
            'category_id' => $this->integer(),
            'source_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_101712_news cannot be reverted.\n";

        return false;
    }
    */
}
