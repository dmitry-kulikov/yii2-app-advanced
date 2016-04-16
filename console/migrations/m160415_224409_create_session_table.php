<?php

use yii\db\Migration;

/**
 * Handles the creation for table `session`.
 */
class m160415_224409_create_session_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $table = '{{%session}}';
        $this->createTable(
            $table,
            [
                'id' => $this->string(40)->notNull(),
                'expire' => $this->integer(),
                'data' => $this->binary(),
            ]
        );
        $this->addPrimaryKey('session_pkey', $table, 'id');
        $this->createIndex('session_expire_key', $table, 'expire');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%session}}');
    }
}
