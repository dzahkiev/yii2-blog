<?php

use yii\db\Migration;

/**
 * Class m190224_151159_alter_table_user_add_auth_key
 */
class m190224_151159_alter_table_user_add_auth_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'auth_key', $this->string(32)->notNull()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'auth_key');
    }
}
