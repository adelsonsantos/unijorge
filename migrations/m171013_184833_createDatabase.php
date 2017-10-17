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
        $this->createTable('user', [
            'user_id' => $this->primaryKey(),
            'user_nome' => $this->string(),
            'user_status' => $this->integer()->defaultValue(1),
            'user_cpf' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171013_184833_createDatabase cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171013_184833_createDatabase cannot be reverted.\n";

        return false;
    }
    */
}
