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
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property string $ship_time
 * @property string $deliver_time
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
            [['product_id', 'amount', 'payment', 'user_id', 'user_name'], 'required'],
            [['product_id', 'amount', 'user_id', 'status'], 'integer'],
            [['payment'], 'number'],
            [['create_time', 'update_time', 'ship_time', 'deliver_time'], 'safe'],
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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'status' => 'Status',
            'ship_time' => 'Ship Time',
            'deliver_time' => 'Deliver Time',
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
