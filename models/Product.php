<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $image_name
 * @property string $price
 * @property string $walmart_price
 * @property string $walmart_url
 * @property string $tmall_price
 * @property string $tmall_url
 * @property string $costco_price
 * @property string $costco_url
 * @property string $target_price
 * @property string $target_url
 * @property string $amazon_price
 * @property string $amazon_url
 * @property string $create_time
 * @property string $update_time
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['status'], 'integer'],
            [['price', 'walmart_price', 'tmall_price', 'costco_price', 'target_price', 'amazon_price'], 'number'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['description', 'walmart_url', 'tmall_url', 'costco_url', 'target_url', 'amazon_url'], 'string', 'max' => 255],
            [['image_name'], 'string', 'max' => 36],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'image_name' => 'Image Name',
            'price' => 'Price',
            'walmart_price' => 'Walmart Price',
            'walmart_url' => 'Walmart Url',
            'tmall_price' => 'Tmall Price',
            'tmall_url' => 'Tmall Url',
            'costco_price' => 'Costco Price',
            'costco_url' => 'Costco Url',
            'target_price' => 'Target Price',
            'target_url' => 'Target Url',
            'amazon_price' => 'Amazon Price',
            'amazon_url' => 'Amazon Url',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
