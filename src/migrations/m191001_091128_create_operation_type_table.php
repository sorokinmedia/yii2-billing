<?php

use yii\db\Migration;

/**
 * Class m191001_091128_create_operation_type_table
 */
class m191001_091128_create_operation_type_table extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('operation_type', [
            'id' => $this->integer()->unique(),
            'name' => $this->string(300),
            'type' => $this->string(50),
            'role' => $this->string(255),
        ]);
        $this->addPrimaryKey('pk-operation_type-id', 'operation_type', 'id');
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk-operation_type-id', 'operation_type');
        $this->dropTable('operation_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190901_091128_add_image_prices cannot be reverted.\n";

        return false;
    }
    */
}
