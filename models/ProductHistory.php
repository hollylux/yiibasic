<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_history".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $create_time
 * @property string $update_time
 * @property string $walmart_price
 * @property string $walmart_url
 * @property string $tmall_price
 * @property string $tmall_url
 * @property string $amazon_price
 * @property string $amazon_url
 * @property string $target_price
 * @property string $target_url
 * @property string $costco_price
 * @property string $costco_url
 * @property string $price
 * @property integer $status
 * @property string $comment
 */
class ProductHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'price'], 'required'],
            [['product_id', 'status'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['walmart_price', 'tmall_price', 'amazon_price', 'target_price', 'costco_price', 'price'], 'number'],
            [['walmart_url', 'tmall_url', 'amazon_url', 'target_url', 'costco_url', 'comment'], 'string', 'max' => 255],
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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'walmart_price' => 'Walmart Price',
            'walmart_url' => 'Walmart Url',
            'tmall_price' => 'Tmall Price',
            'tmall_url' => 'Tmall Url',
            'amazon_price' => 'Amazon Price',
            'amazon_url' => 'Amazon Url',
            'target_price' => 'Target Price',
            'target_url' => 'Target Url',
            'costco_price' => 'Costco Price',
            'costco_url' => 'Costco Url',
            'price' => 'Price',
            'status' => 'Status',
            'comment' => 'Comment',
        ];
    }

    /**
     * @inheritdoc
     * @return ProductHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductHistoryQuery(get_called_class());
    }
}
