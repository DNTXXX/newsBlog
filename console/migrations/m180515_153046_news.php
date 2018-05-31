<?php

//use yii\db\Migration;
use console\components\Migration;
use yii\db\Schema;
/**
 * Class m180515_153046_news
 */
class m180515_153046_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    // public function safeDown()
    // {
    //     echo "m180515_153046_news cannot be reverted.\n";

    //     return false;
    // }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(512)->notNull(),
            'image' => $this->string(512)->notNull(),
            'annotation' => $this->longText()->notNull(),
            'content' => $this->longText()->notNull(),
            'like_social' => $this->integer()->unsigned(),

            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->datetime(),

            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),
            'moderation' => $this->boolean()->notNull(),
            'id_category' => $this->integer()->unsigned(),
        ]);


        $this->createTable('news_category', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(512)->notNull(),
            
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->datetime(),

            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),
            
        ]);

        $this->addForeignKey(
            'news_to_news_category',
            'news',
            'id_category',
            'news_category',
            'id',
            'CASCADE'
        );

        
        
    }

    public function down()
    {
        $this->dropTable('news');

        return false;
    }
    
}
