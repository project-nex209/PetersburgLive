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
                  'id_user' => $this->integer(),
                  'id_excursion' => $this->integer(),
                  'date' => $this->dateTime("Y-m-d H:i:s"),
                  'countMan' => $this->integer(),
                  'countChildren' => $this->integer(),
                  'price'=>$this->integer(),
              ]);

              $this->createIndex(
                  'idx-token-id_user',
                  'token',
                  'id_user'
              );

              $this->addForeignKey(
                  'fk-token-id_user',
                  'token',
                  'id_user',
                  'user',
                  'id',
                  'CASCADE'
              );


              $this->createIndex(
                  'idx-token-excursion',
                  'token',
                  'id_excursion'
              );

              $this->addForeignKey(
                  'fk-token-id_excursion',
                  'token',
                  'id_excursion',
                  'excursion',
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
          'fk-token-id_user',
          'token'
      );

      $this->dropIndex(
          'idx-token-id_user',
          'token'
      );

      $this->dropForeignKey(
          'fk-token-id_excursion',
          'token'
      );

      $this->dropIndex(
          'idx-token-id_excursion',
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
