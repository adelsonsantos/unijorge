<?php

namespace app\models;

use Yii;
use yii\db\Exception;
use Yii\db\Query;

/**
 * This is the model class for table "unijorge.location".
 *
 * @property int $location_id
 * @property string $location_latitude
 * @property string $location_longitude
 * @property string $location_data
 * @property int $device_id
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unijorge.location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_latitude', 'location_longitude'], 'required'],
            [['location_data'], 'safe'],
            [['device_id'], 'integer'],
            ['location_inside', 'boolean'],
            [['location_latitude', 'location_longitude'], 'string', 'max' => 255],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::className(), 'targetAttribute' => ['device_id' => 'device_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'location_latitude' => 'Location Latitude',
            'location_longitude' => 'Location Longitude',
            'location_data' => 'Location Data',
            'device_id' => 'Device ID',
            'location_inside' => 'location_inside ID',
        ];
    }

    public function getLocationDevice()
    {
        return $this->hasOne(Device::className(), ['device_id' => 'device_id']);
    }


    public function getLocationDevicesIcons()
    {
        $connection = \Yii::$app->db;
        return $connection->createCommand('SELECT * FROM UNIJORGE.DEVICE D JOIN UNIJORGE.LOCATION L ON D.DEVICE_ID = L.DEVICE_ID AND L.LOCATION_ID = (SELECT LOCATION_ID FROM UNIJORGE.LOCATION LL WHERE DEVICE_ID = D.DEVICE_ID ORDER BY LOCATION_ID DESC LIMIT 1)')->queryAll();

    }

    public function getLocationOutsideFence()
    {
        $connection = \Yii::$app->db;
        try {
            return $connection->createCommand('SELECT * FROM UNIJORGE.DEVICE D 
                                                    JOIN UNIJORGE.LOCATION L ON D.DEVICE_ID = L.DEVICE_ID AND L.LOCATION_ID = (SELECT LOCATION_ID FROM UNIJORGE.LOCATION LL WHERE DEVICE_ID = D.DEVICE_ID ORDER BY LOCATION_ID DESC LIMIT 1)
                                                    JOIN UNIJORGE.BOVINO B ON B.BOVINO_ID = D.BOVINO_ID
                                                    WHERE L.LOCATION_INSIDE = 0'
            )->queryAll();
        } catch (Exception $e) {
        }
    }
}
