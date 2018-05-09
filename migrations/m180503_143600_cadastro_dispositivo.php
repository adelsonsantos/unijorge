<?php

use yii\db\Migration;

/**
 * Class m180503_143600_cadastro_dispositivo
 */
class m180503_143600_cadastro_dispositivo extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('unijorge.device', [
            'device_id' => $this->primaryKey()->notNull(),
            'device_nome' => $this->string(),
            'device_icon' => $this->text()->notNull(),
            'device_base' => $this->string()->defaultValue('data:image/png;base64,'),
            'device_imei' => $this->string()->notNull(),
            'bovino_id' => $this->integer(),
        ]);

        $this->addForeignKey('bovinoDevice', 'unijorge.device', 'bovino_id', 'unijorge.bovino', 'bovino_id');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('bovinoDevice', 'unijorge.device');
        $this->dropTable('unijorge.device');
    }
}