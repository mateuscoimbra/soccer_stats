<?php

namespace app\models\activequery;

/**
 * This is the ActiveQuery class for [[\app\models\AuthItemChild]].
 *
 * @see \app\models\AuthItemChild
 */
class AuthItemChildQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\AuthItemChild[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\AuthItemChild|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
