<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Device;

/**
 * DeviceSearch represents the model behind the search form of `app\models\Device`.
 */
class DeviceSearch extends Device
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['device_id', 'bovino_id'], 'integer'],
            [['device_nome', 'device_icon', 'device_imei', 'device_base'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Device::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'device_id' => $this->device_id,
            'bovino_id' => $this->bovino_id,
        ]);

        $query->andFilterWhere(['like', 'device_nome', $this->device_nome])
            ->andFilterWhere(['like', 'device_icon', $this->device_icon])
            ->andFilterWhere(['like', 'device_base', $this->device_icon])
            ->andFilterWhere(['like', 'device_imei', $this->device_imei]);

        return $dataProvider;
    }
}
