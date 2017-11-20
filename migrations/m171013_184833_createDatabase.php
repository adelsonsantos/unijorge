<?php

use yii\db\Migration;

/**
 * Class m171013_184833_createDatabase
 */
class m171013_184833_createDatabase extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('unijorge.usuario', [
            'usuario_id' => $this->primaryKey()->notNull(),
            'usuario_nome' => $this->string(45)->notNull(),
            'usuario_status' => $this->integer()->defaultValue(1)->notNull(),
            'usuario_cpf' => $this->string(18)->notNull(),
            'usuario_senha' => $this->text()->notNull(),
            'usuario_foto' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('unijorge.usuario');

        return false;
    }
}
