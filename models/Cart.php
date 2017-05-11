<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $amount
 * @property string $price
 * @property string $payment
 * @property integer $user_id
 * @property string $user_name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['product_id', 'amount', 'price', 'payment', 'user_id', 'user_name', 'created_at', 'updated_at'], 'required'],
            [['product_id', 'amount', 'price', 'user_id', 'user_name'], 'required'],
            //[['product_id', 'amount', 'user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['product_id', 'amount', 'user_id',  'status'], 'integer'],
            [['price', ], 'number'],
            [['user_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'amount' => 'Amount',
            'price' => 'Price',
            'payment' => 'Payment',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartQuery(get_called_class());
    }
}
