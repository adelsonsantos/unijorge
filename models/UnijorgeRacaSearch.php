<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnijorgeRaca;

/**
 * UnijorgeRacaSearch represents the model behind the search form of `app\models\UnijorgeRaca`.
 */
class UnijorgeRacaSearch extends UnijorgeRaca
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['raca_id', 'raca_status'], 'integer'],
            [['raca_nome'], 'safe'],
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
        $query = UnijorgeRaca::find();

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
            'raca_id' => $this->raca_id,
            'raca_status' => $this->raca_status,
        ]);

        $query->andFilterWhere(['like', 'raca_nome', $this->raca_nome]);

        return $dataProvider;
    }
}
