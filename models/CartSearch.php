<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cart;

/**
 * CartSearch represents the model behind the search form about `app\models\Cart`.
 */
class CartSearch extends Cart {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'product_id', 'amount', 'user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['price'], 'number'],
            [['user_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Cart::find();
        //$query = Cart::findAll(['status' => Cart::$STATUS_ACTIVE]);
        // $query = Cart::find()->where(['status' => Cart::$STATUS_ACTIVE])->all();
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
            'amount' => $this->amount,
            'price' => $this->price,
            // 'payment' => $this->payment,
            'user_id' => Cart::$USER_ADM,
            //'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'status' => $this->status,
            'status' => Cart::$STATUS_ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name]);

        return $dataProvider;
    }

}
