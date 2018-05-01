<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FenceCoordenada;

/**
 * FenceCoordenadaSearch represents the model behind the search form of `app\models\FenceCoordenada`.
 */
class FenceCoordenadaSearch extends FenceCoordenada
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fence_coord_id', 'fence_id', 'fence_coord_status'], 'integer'],
            [['fence_coord_latitude', 'fence_coord_longitude'], 'safe'],
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
        $query = FenceCoordenada::find();

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
            'fence_coord_id' => $this->fence_coord_id,
            'fence_id' => $this->fence_id,
            'fence_coord_status' => $this->fence_coord_status,
        ]);

        $query->andFilterWhere(['like', 'fence_coord_latitude', $this->fence_coord_latitude])
            ->andFilterWhere(['like', 'fence_coord_longitude', $this->fence_coord_longitude]);

        return $dataProvider;
    }
}
