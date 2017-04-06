<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductHistory;

/**
 * ProductHistorySearch represents the model behind the search form about `app\models\ProductHistory`.
 */
class ProductHistorySearch extends ProductHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'status'], 'integer'],
            [['create_time', 'update_time', 'walmart_url', 'tmall_url', 'amazon_url', 'target_url', 'costco_url', 'comment'], 'safe'],
            [['walmart_price', 'tmall_price', 'amazon_price', 'target_price', 'costco_price', 'price'], 'number'],
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
        $query = ProductHistory::find();

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
            'id' => $this->id,
            'product_id' => $this->product_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'walmart_price' => $this->walmart_price,
            'tmall_price' => $this->tmall_price,
            'amazon_price' => $this->amazon_price,
            'target_price' => $this->target_price,
            'costco_price' => $this->costco_price,
            'price' => $this->price,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'walmart_url', $this->walmart_url])
            ->andFilterWhere(['like', 'tmall_url', $this->tmall_url])
            ->andFilterWhere(['like', 'amazon_url', $this->amazon_url])
            ->andFilterWhere(['like', 'target_url', $this->target_url])
            ->andFilterWhere(['like', 'costco_url', $this->costco_url])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
