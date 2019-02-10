<?php

use yii\db\Migration;

/**
 * Class m190210_173354_add_constraint_for_article_and_category
 */
class m190210_173354_add_constraint_for_article_and_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-article-category_id-category-id',
            'article',
            'category_id',
            'category',
            'id',
            'RESTRICT',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-article-category_id-category-id', '{{%article}}');
    }
}
