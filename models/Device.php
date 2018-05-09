<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unijorge.device".
 *
 * @property int $device_id
 * @property string $device_nome
 * @property string $device_icon
 * @property string $device_imei
 * @property string $device_base
 * @property int $bovino_id
 */
class Device extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unijorge.device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['device_icon', 'device_imei'], 'required'],
            [['bovino_id'], 'integer'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
            [['device_nome', 'device_imei', 'device_icon', 'device_base'], 'string'],
            [['bovino_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bovino::className(), 'targetAttribute' => ['bovino_id' => 'bovino_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'device_id' => 'Device ID',
            'device_nome' => 'Device Nome',
            'device_icon' => 'Device Icon',
            'device_base' => 'device_base',
            'device_imei' => 'Device Imei',
            'bovino_id' => 'Bovino ID',
        ];
    }

    public function getDeviceBovino()
    {
        return $this->hasOne(Bovino::className(), ['bovino_id' => 'bovino_id']);
    }
}
