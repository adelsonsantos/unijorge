<?php

use yii\db\Migration;

/**
 * Class m180509_190617_insere_cerca_e_localizacao
 */
class m180509_190617_insere_cerca_e_localizacao extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('unijorge.fence', [
            'fence_descricao' => 'Unijorge',
            'fence_cor' => '#83d5f8',
            'fence_borda' => 5,
            'fence_status' => 1]);

        $this->batchInsert('unijorge.fence_coordenada',
            ['fence_id', 'fence_coord_latitude', 'fence_coord_longitude'],
            [
                [1, '-12.9369178', '-38.4136086'],
                [1, '-12.9364984', '-38.4081069'],
                [1, '-12.93934', '-38.4079572'],
                [1, '-12.9399273', '-38.4135226'],
                [1, '-12.9369178', '-38.4136086']
            ]);

        $this->insert('unijorge.device', [
            'device_nome' => 'Dispositivo 1',
            'device_icon' => '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',
            'device_base' => 'data:image/png;base64,',
            'device_imei' => '123456789111256'
        ]);

        $this->batchInsert('unijorge.location',
            ['location_latitude', 'location_longitude', 'location_data', 'device_id'],
            [
                ['-12.9387118', '-38.4121738', '2018-05-07 10:30:06', 1],
                ['-12.9387118', '-38.4121738', '2018-05-07 10:50:20', 1],
                ['-12.9387118', '-38.4121738', '2018-05-08 16:48:15', 1],
            ]);
    }



    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180509_190617_insere_cerca_e_localizacao cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180509_190617_insere_cerca_e_localizacao cannot be reverted.\n";

        return false;
    }
    */
}
