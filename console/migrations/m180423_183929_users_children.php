<?php

use yii\db\Migration;

/**
 * Class m180423_183929_users_children
 */
class m180423_183929_users_children extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('users_children', [
            'id' => $this->primaryKey(),
            'id_users' => $this->integer(),
            'id_children' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-users_children-id_users',
            'users_children',
            'id_users'
        );

        $this->addForeignKey(
            'fk-users_children-id_users',
            'users_children',
            'id_users',
            'users',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-users_children-id_children',
            'users_children',
            'id_children'
        );

        $this->addForeignKey(
            'fk-users_children-id_children',
            'users_children',
            'id_children',
            'children',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey(
            'fk-users_children-id_users',
            'users_children'
        );

        $this->dropIndex(
            'idx-users_children-id_users',
            'users_children'
        );

        $this->dropForeignKey(
            'fk-users_children-id_children',
            'users_children'
        );

        $this->dropIndex(
            'idx-users_children-id_children',
            'users_children'
        );


        $this->dropTable('users_children');
  }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180423_183929_users_children cannot be reverted.\n";

        return false;
    }
    */
}
