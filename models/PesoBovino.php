<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unijorge.pesoBovino".
 *
 * @property int $peso_id
 * @property int $bovino_id
 * @property int $peso_peso
 * @property string $peso_data
 */
class PesoBovino extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unijorge.pesoBovino';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bovino_id', 'peso_peso', 'peso_data'], 'required'],
            [['bovino_id', 'peso_peso'], 'integer'],
            [['peso_data'], 'safe'],
            [['bovino_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bovino::className(), 'targetAttribute' => ['bovino_id' => 'bovino_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'peso_id' => 'Peso ID',
            'bovino_id' => 'Bovino ID',
            'peso_peso' => 'Peso Peso',
            'peso_data' => 'Peso Data',
        ];
    }
}
