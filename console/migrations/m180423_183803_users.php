<?php

use yii\db\Migration;

/**
 * Class m180423_183803_users
 */
class m180423_183803_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date' => $this->date("Y-m-d"),
            'email' => $this->string(),
            'phone' => $this->integer(),
            'password' => $this->string(),
            'isAdmin'=>$this->integer()->defaultValue(0),
            'family' => $this->integer()->defaultValue(Null),
            'children' => $this->integer()->defaultValue(Null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180423_183803_users cannot be reverted.\n";

        return false;
    }
    */
}
