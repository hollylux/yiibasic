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
    //const CATEGORIES = ['1' => 'kids', '2' => 'mom', '3' => 'dad', '4' => 'luxury', 10' => 'suprise'];
    const CATEGORIES = ['1' => '宝宝食品', '2' => '宝宝呵护', '10' => '辣妈Hot', '20' => '酷爹Cool', '30' => '轻奢', '40' => '特殊', '50' => '小惊喜', '60' => '其他未分类'];
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
            [['name', 'my_price', 'cn_price', 'us_price', 'us_cost'], 'required'],
            [['status'], 'integer'],
            [['category'], 'integer'],
            [['my_price', 'cn_price', 'us_price', 'us_cost'], 'number'],
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
            'name' => '名称',
            'description' => '描述',
            'category' => '类别',
            'status' => 'Status',
            'images' => '图片',
            'my_price' => '建议零售价(RMB)',
            'cn_price' => '国内参考价(RMB)',
            'cn_url' => '国内参考网址',
            'us_price' => 'US标价($)',
            'us_cost' => 'US成本价(RMB）',
            'us_url' => 'US参考网址',
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }

}
