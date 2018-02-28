<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m180228_200955_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'title' => $this->string(),
            'description' => $this->text(),
            'pubdate' => $this->time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }
}
