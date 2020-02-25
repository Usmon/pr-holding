<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200225_125945_create_table_apples
 */
class m200225_125945_create_table_fruits extends Migration
{
    /**
     * Table name
     */
    private static $TABLE_NAME = 'fruits';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::$TABLE_NAME, [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'color' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER .' NOT NULL',
            'eat_percent' => Schema::TYPE_INTEGER .' NOT NULL',
            'date_appearance' => Schema::TYPE_TIMESTAMP .' NOT NULL',
            'date_fall' => Schema::TYPE_TIMESTAMP .' NOT NULL',
            'deleted_at' => Schema::TYPE_TIMESTAMP .' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table->dropTable(self::$TABLE_NAME);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200225_125945_create_table_apples cannot be reverted.\n";

        return false;
    }
    */
}
