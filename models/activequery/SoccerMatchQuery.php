<?php

namespace app\models\activequery;

/**
 * This is the ActiveQuery class for [[\app\models\SoccerMatch]].
 *
 * @see \app\models\SoccerMatch
 */
class SoccerMatchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\SoccerMatch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\SoccerMatch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
