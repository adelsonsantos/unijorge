<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unijorge.fence".
 *
 * @property int $fence_id
 * @property string $fence_descricao
 * @property string $fence_cor
 * @property int $fence_borda
 * @property int $fence_status
 */
class Fence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unijorge.fence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fence_descricao', 'fence_cor', 'fence_borda'], 'required'],
            [['fence_borda', 'fence_status'], 'integer'],
            [['fence_descricao'], 'string', 'max' => 45],
            [['fence_cor'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fence_id' => 'ID',
            'fence_descricao' => 'Descricao',
            'fence_cor' => 'Cor',
            'fence_borda' => 'Borda',
            'fence_status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFenceCoords()
    {
        return $this->hasMany(FenceCoordenada::className(), ['fence_id' => 'fence_id']);
    }
}
