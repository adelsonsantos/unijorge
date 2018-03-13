<?php

use yii\db\Migration;

/**
 * Class m180313_191803_peso_bovino
 */
class m180313_191803_peso_bovino extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('unijorge.pesoBovino', [
            'peso_id' => $this->primaryKey()->notNull(),
            'bovino_id' => $this->integer()->notNull(),
            'peso_peso' => $this->integer()->notNull(),
            'peso_data' => $this->date()->notNull(),
        ]);

        $this->addForeignKey('bovinoPeso', 'unijorge.pesoBovino', 'bovino_id', 'unijorge.bovino', 'bovino_id');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('bovinoPeso', 'unijorge.pesoBovino');
        $this->dropTable('unijorge.pesoBovino');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180313_191803_peso_bovino cannot be reverted.\n";

        return false;
    }
    */
}
