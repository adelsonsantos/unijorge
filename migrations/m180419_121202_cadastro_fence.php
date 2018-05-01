<?php

use yii\db\Migration;

/**
 * Class m180419_121202_cadastro_fence
 */
class m180419_121202_cadastro_fence extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('unijorge.fence', [
            'fence_id' => $this->primaryKey()->notNull(),
            'fence_descricao' => $this->string(45)->notNull(),
            'fence_cor' => $this->string(20)->notNull(),
            'fence_borda' => $this->integer(1)->notNull(),
            'fence_status' => $this->integer()
        ]);

        $this->createTable('unijorge.fence_coordenada', [
            'fence_coord_id' => $this->primaryKey()->notNull(),
            'fence_id' => $this->integer(),
            'fence_coord_latitude' => $this->string()->notNull(),
            'fence_coord_longitude' => $this->string()->notNull(),
            'fence_coord_status'   => $this->integer()
        ]);

        $this->addForeignKey('fenceCoordenada', 'unijorge.fence_coordenada', 'fence_id', 'unijorge.fence', 'fence_id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fenceCoordenada', 'unijorge.fence_coordenada');
        $this->dropTable('unijorge.fence_coordenada');
        $this->dropTable('unijorge.fence');
    }
}
