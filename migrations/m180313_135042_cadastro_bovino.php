<?php

use yii\db\Migration;

/**
 * Class m180313_135042_cadastro_bovino
 */
class m180313_135042_cadastro_bovino extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('unijorge.bovino', [
            'bovino_id' => $this->primaryKey()->notNull(),
            'bovino_nome' => $this->string(45)->notNull(),
            'bovino_status' => $this->integer()->defaultValue(1)->notNull(),
            'bovino_idade' => $this->integer(2)->notNull(),
            'bovino_foto' => $this->text(),
            'raca_id' => $this->integer()->notNull(),
        ]);

        $this->createTable('unijorge.raca', [
            'raca_id' => $this->primaryKey()->notNull(),
            'raca_nome' => $this->string(45)->notNull(),
            'raca_status' => $this->integer()->defaultValue(1)->notNull(),
        ]);

        $this->addForeignKey('bovinoRaca', 'unijorge.bovino', 'raca_id', 'unijorge.raca', 'raca_id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('bovinoRaca', 'unijorge.bovino');
        $this->dropTable('unijorge.raca');
        $this->dropTable('unijorge.bovino');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180313_135042_cadastro_bovino cannot be reverted.\n";

        return false;
    }
    */
}
