<?php

use yii\db\Migration;

/**
 * Class m171120_031707_usuarios_cadastrados
 */
class m171120_031707_usuarios_cadastrados extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('unijorge.usuario', [
        'usuario_nome'  => 'Adelson',
        'usuario_status'=> 1,
        'usuario_cpf'   => '055.853.645-02',
        'usuario_senha' => '356a192b7913b04c54574d18c28d46e6395428ab',
        'usuario_foto'  => null
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('unijorge.usuario', [
            'usuario_id' => 1
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171120_031707_usuarios_cadastrados cannot be reverted.\n";

        return false;
    }
    */
}
