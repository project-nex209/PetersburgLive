<?php

use yii\db\Migration;

/**
 * Class m180425_061357_user_children
 */
class m180425_061357_user_children extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->createTable('user_children', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_children' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-user_children-id_user',
            'user_children',
            'id_user'
        );

        $this->addForeignKey(
            'fk-user_children-id_user',
            'user_children',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-user_children-id_children',
            'user_children',
            'id_children'
        );

        $this->addForeignKey(
            'fk-user_children-id_children',
            'user_children',
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
            'fk-user_children-id_user',
            'user_children'
        );

        $this->dropIndex(
            'idx-user_children-id_user',
            'user_children'
        );

        $this->dropForeignKey(
            'fk-user_children-id_children',
            'user_children'
        );

        $this->dropIndex(
            'idx-user_children-id_children',
            'user_children'
        );


        $this->dropTable('user_children');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180425_061357_user_children cannot be reverted.\n";

        return false;
    }
    */
}
