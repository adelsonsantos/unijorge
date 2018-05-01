<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unijorge.fence_coordenada".
 *
 * @property int $fence_coord_id
 * @property int $fence_id
 * @property string $fence_coord_latitude
 * @property string $fence_coord_longitude
 * @property int $fence_coord_status
 */
class FenceCoordenada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unijorge.fence_coordenada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fence_id', 'fence_coord_status'], 'integer'],
            [['fence_coord_latitude', 'fence_coord_longitude'], 'required'],
            [['fence_coord_latitude', 'fence_coord_longitude'], 'string', 'max' => 255],
            [['fence_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fence::className(), 'targetAttribute' => ['fence_id' => 'fence_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fence_coord_id' => 'Fence Coord ID',
            'fence_id' => 'Fence ID',
            'fence_coord_latitude' => 'Fence Coord Latitude',
            'fence_coord_longitude' => 'Fence Coord Longitude',
            'fence_coord_status' => 'Fence Coord Status',
        ];
    }
}
