<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types_soccer_match_events".
 *
 * @property int $id
 * @property string $event_type
 *
 * @property RelEventSoccerMatch[] $relEventSoccerMatches
 * @property RelEventSoccerMatch[] $relEventSoccerMatches0
 */
class TypesSoccerMatchEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'types_soccer_match_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_type'], 'required'],
            [['event_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'event_type' => Yii::t('app', 'Event Type'),
        ];
    }

    /**
     * Gets query for [[RelEventSoccerMatches]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\RelEventSoccerMatchQuery
     */
    public function getRelEventSoccerMatches()
    {
        return $this->hasMany(RelEventSoccerMatch::className(), ['event_type_one_id' => 'id']);
    }

    /**
     * Gets query for [[RelEventSoccerMatches0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\RelEventSoccerMatchQuery
     */
    public function getRelEventSoccerMatches0()
    {
        return $this->hasMany(RelEventSoccerMatch::className(), ['event_type_two_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\TypesSoccerMatchEventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\TypesSoccerMatchEventsQuery(get_called_class());
    }
}
