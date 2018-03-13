<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unijorge.raca".
 *
 * @property int $raca_id
 * @property string $raca_nome
 * @property int $raca_status
 */
class UnijorgeRaca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unijorge.raca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['raca_nome'], 'required'],
            [['raca_status'], 'integer'],
            [['raca_nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'raca_id' => 'Raca ID',
            'raca_nome' => 'Nome',
            'raca_status' => 'Status',
        ];
    }
}
