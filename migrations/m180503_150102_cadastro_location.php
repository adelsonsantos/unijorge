<?php

use yii\db\Migration;

/**
 * Class m180503_150102_cadastro_location
 */
class m180503_150102_cadastro_location extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('unijorge.location', [
            'location_id' => $this->primaryKey()->notNull(),
            'location_latitude' => $this->string()->notNull(),
            'location_longitude' => $this->string()->notNull(),
            'location_data'   => $this->dateTime(),
            'device_id' => $this->integer()
        ]);

        $this->addForeignKey('deviceLocation', 'unijorge.location', 'device_id', 'unijorge.device', 'device_id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('deviceLocation','unijorge.location');
        $this->dropTable('unijorge.location');
    }
}
