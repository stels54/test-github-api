<?php

use yii\db\Migration;

/**
 * Class m210620_195644_tbl_github_users
 */
class m210620_195644_tbl_github_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_github_users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_github_users');
    }
}
