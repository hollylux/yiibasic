<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MyUser]].
 *
 * @see MyUser
 */
class MyUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MyUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MyUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
