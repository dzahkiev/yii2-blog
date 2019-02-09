<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_tag}}`.
 */
class m190209_184301_create_article_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_tag}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-article_tag-article_id-article-id',
            'article_tag',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-article_tag-tag_id-tag-id',
            'article_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-article_tag-article_id-article-id', '{{%article_tag}}');
        $this->dropForeignKey('fk-article_tag-tag_id-tag-id', '{{%article_tag}}');
        $this->dropTable('{{%article_tag}}');
    }
}
