<?php

namespace app\models\activequery;

/**
 * This is the ActiveQuery class for [[\app\models\Player]].
 *
 * @see \app\models\Player
 */
class PlayerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Player[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Player|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
