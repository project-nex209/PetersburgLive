<?php

use yii\db\Migration;

/**
 * Class m180423_183841_children
 */
class m180423_183841_children extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('children', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date' => $this->date("Y-m-d"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropTable('children');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180423_183841_children cannot be reverted.\n";

        return false;
    }
    */
}
