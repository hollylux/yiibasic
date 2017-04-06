<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $pwd
 * @property string $wechat
 * @property integer $qq
 * @property integer $cellphone
 * @property string $address
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property string $email
 * @property string $ip
 */
class MyUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['qq', 'cellphone', 'status'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name', 'wechat'], 'string', 'max' => 20],
            [['pwd', 'email'], 'string', 'max' => 32],
            [['address'], 'string', 'max' => 96],
            [['ip'], 'string', 'max' => 15],
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
            'pwd' => 'Pwd',
            'wechat' => 'Wechat',
            'qq' => 'Qq',
            'cellphone' => 'Cellphone',
            'address' => 'Address',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'status' => 'Status',
            'email' => 'Email',
            'ip' => 'Ip',
        ];
    }

    /**
     * @inheritdoc
     * @return MyUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MyUserQuery(get_called_class());
    }
}
