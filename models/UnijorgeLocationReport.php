<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unijorge.location".
 *
 * @property int $location_id
 * @property string $location_latitude
 * @property string $location_longitude
 * @property string $location_data_report_inicio
 * @property string $location_data_report_fim
 * @property string $location_data
 * @property int $device_id
 * @property int $location_inside
 */
class UnijorgeLocationReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $location_data_report_inicio;
    public $location_data_report_fim;

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
          //  [['location_latitude', 'location_longitude'], 'required'],
            [['location_data'], 'safe'],
            [['device_id'], 'integer'],
            [['location_latitude', 'location_longitude'], 'string', 'max' => 255],
            [['location_data_report_inicio', 'location_data_report_fim'], 'date'],
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
            'location_inside' => 'Location Inside',
            'location_data_report_inicio' => 'location_data_report_inicio',
            'location_data_report_fim' => 'location_data_report_fim',
        ];
    }
}
