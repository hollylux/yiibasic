<?php

namespace app\models;

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
            [['id', 'status', 'category'], 'integer'],
            [['name', 'description',  'us_url', 'cn_url'], 'safe'],
            [['my_price', 'us_price', 'cn_price', 'us_cost'], 'number'],
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
            'status' => 1,
            //'status' => '$this->status',
            'my_price' => $this->my_price,
            'us_price' => $this->us_price,
            'us_cost' => $this->us_cost,
            'cn_price' => $this->cn_price,
            //'created_at' => $this->created_at,
            'category' => $this->category,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            //->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'us_url', $this->us_url])
            ->andFilterWhere(['like', 'cn_url', $this->cn_url])
            ->andFilterWhere(['like', 'us_cost', $this->us_cost])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
                ->orderBy('updated_at DESC');

        return $dataProvider;
    }
}
