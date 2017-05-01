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
 * @property string $images
 * @property string $my_price
 * @property string $us_price
 * @property string $us_url
 * @property string $cn_price
 * @property string $cn_url
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
            [['name', 'my_price'], 'required'],
            [['status'], 'integer'],
            [['my_price', 'us_price', 'cn_price'], 'number'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['description', 'us_url', 'cn_url'], 'string', 'max' => 255],
            [['images'], 'string', 'max' => 32],
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
            'images' => 'Images',
            'my_price' => 'My Price',
            'us_price' => 'Us Price',
            'us_url' => 'Us Url',
            'cn_price' => 'Cn Price',
            'cn_url' => 'Cn Url',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
