<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnijorgeLocationReport;

/**
 * LocationReportSearch represents the model behind the search form of `app\models\Location`.
 */
class LocationReportSearch extends UnijorgeLocationReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id', 'device_id', 'location_inside'], 'integer'],
            [['location_latitude', 'location_longitude', 'location_data', 'location_data_report_inicio', 'location_data_report_fim'], 'safe'],
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
        $query = Location::find();

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
            'location_id' => $this->location_id,
            'location_data' => $this->location_data,
            'device_id' => $this->device_id,
            'location_inside' => $this->location_inside,
        ]);

        $query->andFilterWhere(['like', 'location_latitude', $this->location_latitude])
            ->andFilterWhere(['like', 'location_longitude', $this->location_longitude])
            ->andFilterWhere(['>=', 'location_data', $this->location_data_report_inicio])
            ->andFilterWhere(['<=', 'location_data', $this->location_data_report_fim]);

        return $dataProvider;
    }
}
