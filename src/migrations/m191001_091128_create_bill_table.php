<?php

use yii\db\Migration;

/**
 * Class m191001_091128_create_bill_table
 */
class m191001_091128_create_bill_table extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('bill', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'sum' => $this->money(19,4),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->dropTable('bill');
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
