<?php

use yii\db\Migration;

/**
 * Class m180509_194105_insere_bovino
 */
class m180509_194105_insere_bovino extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('unijorge.raca', [
            'raca_nome' => 'Nelore',
            'raca_status' => 1
        ]);

        $this->insert('unijorge.bovino', [
            'bovino_nome' => 'Mimoso',
            'bovino_status' => 1,
            'bovino_idade' => 7,
            'raca_id' => 1
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180509_194105_insere_bovino cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180509_194105_insere_bovino cannot be reverted.\n";

        return false;
    }
    */
}
