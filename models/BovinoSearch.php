<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bovino;

/**
 * BovinoSearch represents the model behind the search form of `app\models\Bovino`.
 */
class BovinoSearch extends Bovino
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bovino_id', 'bovino_status', 'bovino_idade', 'raca_id'], 'integer'],
            [['bovino_nome', 'bovino_foto'], 'safe'],
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
        $query = Bovino::find();

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
            'bovino_id' => $this->bovino_id,
            'bovino_status' => $this->bovino_status,
            'bovino_idade' => $this->bovino_idade,
            'raca_id' => $this->raca_id,
        ]);

        $query->andFilterWhere(['like', 'bovino_nome', $this->bovino_nome])
            ->andFilterWhere(['like', 'bovino_foto', $this->bovino_foto]);

        return $dataProvider;
    }
}
