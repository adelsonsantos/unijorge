<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unijorge.bovino".
 *
 * @property int $bovino_id
 * @property string $bovino_nome
 * @property int $bovino_status
 * @property int $bovino_idade
 * @property string $bovino_foto
 * @property int $raca_id
 */
class Bovino extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unijorge.bovino';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bovino_nome', 'bovino_idade', 'raca_id'], 'required'],
            [['bovino_status', 'bovino_idade', 'raca_id'], 'integer'],
            [['bovino_foto'], 'string'],
            [['bovino_nome'], 'string', 'max' => 45],
            [['raca_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnijorgeRaca::className(), 'targetAttribute' => ['raca_id' => 'raca_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bovino_id' => 'ID',
            'bovino_nome' => 'Nome',
            'bovino_status' => 'Status',
            'bovino_idade' => 'Idade',
            'bovino_foto' => 'Foto',
            'raca_id' => 'Raca',
        ];
    }
}
