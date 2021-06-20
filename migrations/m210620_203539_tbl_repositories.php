<?php

use yii\db\Migration;

/**
 * Class m210620_203539_tbl_repositories
 */
class m210620_203539_tbl_repositories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_repositories', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()
        ]);
        
        $this->addForeignKey(
            'fk_tbl_repositories_user_id',
            'tbl_repositories',
            'user_id',
            'tbl_github_users',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tbl_repositories_user_id', 'tbl_repositories');
        $this->dropTable('tbl_repositories');
    }
}
