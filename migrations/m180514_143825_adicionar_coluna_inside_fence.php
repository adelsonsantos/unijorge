<?php

use yii\db\Migration;

/**
 * Class m180514_143825_adicionar_coluna_inside_fence
 */
class m180514_143825_adicionar_coluna_inside_fence extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('unijorge.location', 'location_inside', $this->boolean());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('unijorge.location', 'location_inside');
    }
}
