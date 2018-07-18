<?php

use yii\db\Migration;

/**
 * Class m180718_102204_news_category
 */
class m180718_102204_news_category extends Migration
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

        $this->createTable('{{%news_category}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(1024)->notNull(),
            'title' => $this->string(512)->notNull(),
            'text' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('fk_news_category', '{{%news}}', 'category_id', '{{%news_category}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news_category}}');
        $this->dropForeignKey('fk_article_category', '{{%news}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_102204_news_category cannot be reverted.\n";

        return false;
    }
    */
}
