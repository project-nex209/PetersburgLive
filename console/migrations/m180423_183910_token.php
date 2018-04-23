<?php

use yii\db\Migration;

/**
 * Class m180423_183910_token
 */
class m180423_183910_token extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('token', [
                  'id' => $this->primaryKey(),
                  'id_users' => $this->integer(),
                  'excursion' => $this->string(),
                  'date' => $this->date("Y-m-d H:i:s"),
                  'countMan' => $this->integer(),
                  'children' => $this->integer()->defaultValue(0),
                  'price'=>$this->integer(),
              ]);

              $this->createIndex(
                  'idx-token-id_users',
                  'token',
                  'id_users'
              );

              $this->addForeignKey(
                  'fk-token-id_users',
                  'token',
                  'id_users',
                  'users',
                  'id',
                  'CASCADE'
              );


              $this->createIndex(
                  'idx-token-excursion',
                  'token',
                  'excursion'
              );

              $this->addForeignKey(
                  'fk-token-excursion',
                  'token',
                  'excursion',
                  'excursion',
                  'excursion',
                  'CASCADE'
              );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey(
          'fk-token-id_users',
          'token'
      );

      $this->dropIndex(
          'idx-token-id_users',
          'token'
      );

      $this->dropForeignKey(
          'fk-token-excursion',
          'token'
      );

      $this->dropIndex(
          'idx-token-excursion',
          'token'
      );

      $this->dropTable('token');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180423_183910_token cannot be reverted.\n";

        return false;
    }
    */
}
