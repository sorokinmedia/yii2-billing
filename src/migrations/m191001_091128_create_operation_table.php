<?php

use yii\db\Migration;

/**
 * Class m191001_091128_create_operation_table
 */
class m191001_091128_create_operation_table extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('operation', [
            'id' => $this->primaryKey(),
            'bill_id' => $this->integer(),
            'type_id' => $this->integer(),
            'user_id' => $this->integer(),
            'model_id' => $this->integer(),
            'sum' => $this->money(19,4),
            'sum_prev' => $this->money(19,4),
            'comment' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->dropTable('operation');
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
