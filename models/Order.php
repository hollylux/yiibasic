<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $amount
 * @property string $payment
 * @property integer $user_id
 * @property string $user_name
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $shiped_at
 * @property string $delivered_at
 * @property string $tracking_number
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'amount', 'payment', 'user_id', 'user_name', 'created_at', 'updated_at'], 'required'],
            [['product_id', 'amount', 'user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['payment'], 'number'],
            [['shiped_at', 'delivered_at'], 'safe'],
            [['user_name'], 'string', 'max' => 20],
            [['tracking_number'], 'string', 'max' => 16],
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
            'payment' => 'Payment',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'shiped_at' => 'Shiped At',
            'delivered_at' => 'Delivered At',
            'tracking_number' => 'Tracking Number',
        ];
    }

    /**
     * @inheritdoc
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
