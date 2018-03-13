<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PesoBovino;

/**
 * PesoBovinoSearch represents the model behind the search form of `app\models\PesoBovino`.
 */
class PesoBovinoSearch extends PesoBovino
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peso_id', 'bovino_id', 'peso_peso'], 'integer'],
            [['peso_data'], 'safe'],
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
        $query = PesoBovino::find();

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
            'peso_id' => $this->peso_id,
            'bovino_id' => $this->bovino_id,
            'peso_peso' => $this->peso_peso,
            'peso_data' => $this->peso_data,
        ]);

        return $dataProvider;
    }
}
