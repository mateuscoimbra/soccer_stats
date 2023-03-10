<?php

namespace app\models\activequery;

/**
 * This is the ActiveQuery class for [[\app\models\AuthRule]].
 *
 * @see \app\models\AuthRule
 */
class AuthRuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\AuthRule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\AuthRule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
