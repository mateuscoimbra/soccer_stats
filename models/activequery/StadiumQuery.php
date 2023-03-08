<?php

namespace app\models\activequery;

/**
 * This is the ActiveQuery class for [[\app\models\Stadium]].
 *
 * @see \app\models\Stadium
 */
class StadiumQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Stadium[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Stadium|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
