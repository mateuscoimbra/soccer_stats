<?php

namespace app\models\activequery;

/**
 * This is the ActiveQuery class for [[\app\models\RelEventSoccerMatch]].
 *
 * @see \app\models\RelEventSoccerMatch
 */
class RelEventSoccerMatchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\RelEventSoccerMatch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\RelEventSoccerMatch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
