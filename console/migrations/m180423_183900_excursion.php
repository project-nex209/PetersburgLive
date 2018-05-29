<?php

use yii\db\Migration;

/**
 * Class m180423_183900_excursion
 */
class m180423_183900_excursion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('excursion', [
                  'id' => $this->primaryKey(),
                  'excursion' => $this->string(),
                  'position' => $this->string(),
                  'priceMan' => $this->integer(),
                  'priceChildren' => $this->integer(),
      ]);
      
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('excursion');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180423_183900_excursion cannot be reverted.\n";

        return false;
    }
    */
}
