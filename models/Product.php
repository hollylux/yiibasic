<?php

namespace app\models;

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
 * @property string $created_at
 * @property string $updated_at
 * @property integer $category
 * @property integer $favcount
 */
class Product extends \yii\db\ActiveRecord {

    const STATUS_ACTIVE = 1;
    //const CATEGORIES = ['1' => 'kids', '2' => 'mom', '3' => 'dad', '4' => 'luxury', '10' => 'suprise'];
    const CATEGORIES = ['1' => 'Kids', '2' => 'Hot mom', '3' => 'Cool dad', '4' => 'Luxury', '10' => 'Suprise'];
    const ORDERBY = ['top' => '1', 'price' => '2'];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'my_price'], 'required'],
            [['status'], 'integer'],
            [['category'], 'integer'],
            [['my_price', 'us_price', 'cn_price'], 'number'],
            // [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['description', 'us_url', 'cn_url'], 'string', 'max' => 255],
            [['images'], 'string', 'max' => 64],
        ];
    }

    /*
      public function behaviors() {
      return [
      TimestampBehavior::className(),
      ];
      }

     */

    /**
     * Adding time.. 
     * @return type

      public function behaviors() {
      return [
      [
      'class' => TimestampBehavior::className(),
      'createdAtAttribute' => 'create_time',
      'updatedAtAttribute' => 'update_time',
      'value' => new Expression('NOW()')
      ]
      ];
      }


      public function behaviors() {
      return [
      'timestamp' => [
      'class' => TimestampBehavior::className(),
      'attributes' => [
      ActiveRecord::EVENT_BEFORE_INSERT => 'create_time',
      ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time'
      ],
      'value' => function() {
      return date('Y-m-d H:i:s');
      }// unix timestamp
      ]
      ];
      }
     */

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'category' => 'Category',
            'status' => 'Status',
            'images' => 'Images',
            'my_price' => 'My Price',
            'us_price' => 'US Price',
            'us_url' => 'US URL',
            'cn_price' => 'CN Price',
            'cn_url' => 'CN URL',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
