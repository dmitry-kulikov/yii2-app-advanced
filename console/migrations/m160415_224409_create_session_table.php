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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $table = '{{%session}}';
        $this->createTable(
            $table,
            [
                'id' => $this->string(40)->notNull(),
                'expire' => $this->integer(),
                'data' => $this->binary(),
            ],
            $tableOptions
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
