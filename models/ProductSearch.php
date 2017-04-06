<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'description', 'image_name', 'walmart_url', 'tmall_url', 'costco_url', 'target_url', 'amazon_url', 'create_time', 'update_time'], 'safe'],
            [['price', 'walmart_price', 'tmall_price', 'costco_price', 'target_price', 'amazon_price'], 'number'],
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
        $query = Product::find();

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
            'status' => $this->status,
            'price' => $this->price,
            'walmart_price' => $this->walmart_price,
            'tmall_price' => $this->tmall_price,
            'costco_price' => $this->costco_price,
            'target_price' => $this->target_price,
            'amazon_price' => $this->amazon_price,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image_name', $this->image_name])
            ->andFilterWhere(['like', 'walmart_url', $this->walmart_url])
            ->andFilterWhere(['like', 'tmall_url', $this->tmall_url])
            ->andFilterWhere(['like', 'costco_url', $this->costco_url])
            ->andFilterWhere(['like', 'target_url', $this->target_url])
            ->andFilterWhere(['like', 'amazon_url', $this->amazon_url]);

        return $dataProvider;
    }
}
