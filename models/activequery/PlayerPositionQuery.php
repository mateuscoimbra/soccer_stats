<?php

namespace app\models\activequery;

/**
 * This is the ActiveQuery class for [[\app\models\PlayerPosition]].
 *
 * @see \app\models\PlayerPosition
 */
class PlayerPositionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\PlayerPosition[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\PlayerPosition|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
