<?php

use yii\db\Migration;

/**
 * Class m180720_132015_add_fulltext_to_news
 */
class m180720_132015_add_fulltext_to_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $connection = \Yii::$app->getDb();
        $command = $connection->createCommand("ALTER TABLE news ADD FULLTEXT(text)");
        $command->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180720_132015_add_fulltext_to_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180720_132015_add_fulltext_to_news cannot be reverted.\n";

        return false;
    }
    */
}
