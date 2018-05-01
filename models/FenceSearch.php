<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fence;

/**
 * FenceSearch represents the model behind the search form of `app\models\Fence`.
 */
class FenceSearch extends Fence
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fence_id', 'fence_borda', 'fence_status'], 'integer'],
            [['fence_descricao', 'fence_cor'], 'safe'],
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
        $query = Fence::find();

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
            'fence_id' => $this->fence_id,
            'fence_borda' => $this->fence_borda,
            'fence_status' => $this->fence_status,
        ]);

        $query->andFilterWhere(['like', 'fence_descricao', $this->fence_descricao])
            ->andFilterWhere(['like', 'fence_cor', $this->fence_cor]);

        return $dataProvider;
    }
}
