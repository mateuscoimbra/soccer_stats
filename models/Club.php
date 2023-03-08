<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "club".
 *
 * @property int $id
 * @property string $club
 *
 * @property SoccerMatch[] $soccerMatches
 * @property SoccerMatch[] $soccerMatches0
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club'], 'required'],
            [['club'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'club' => Yii::t('app', 'Club'),
        ];
    }

    /**
     * Gets query for [[SoccerMatches]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\SoccerMatchQuery
     */
    public function getSoccerMatches()
    {
        return $this->hasMany(SoccerMatch::className(), ['club_one_id' => 'id']);
    }

    /**
     * Gets query for [[SoccerMatches0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\SoccerMatchQuery
     */
    public function getSoccerMatches0()
    {
        return $this->hasMany(SoccerMatch::className(), ['club_two_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\ClubQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\ClubQuery(get_called_class());
    }
}
