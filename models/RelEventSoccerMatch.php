<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_event_soccer_match".
 *
 * @property int $id
 * @property string $type_time
 * @property int $soccer_match_id
 * @property int $player_one_id
 * @property int|null $player_two_id
 * @property int $club_player_one_id
 * @property int|null $club_player_two_id
 * @property int $event_type_one_id
 * @property int|null $event_type_two_id
 * @property string|null $event_time_exactly
 * @property string|null $event_time_start
 * @property string|null $event_time_end
 * @property int $created_by
 * @property string $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 *
 * @property Club $clubPlayerOne
 * @property Club $clubPlayerTwo
 * @property User $createdBy
 * @property TypesSoccerMatchEvents $eventTypeOne
 * @property TypesSoccerMatchEvents $eventTypeTwo
 * @property Player $playerOne
 * @property Player $playerTwo
 * @property SoccerMatch $soccerMatch
 * @property User $updatedBy
 */
class RelEventSoccerMatch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_event_soccer_match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_time', 'soccer_match_id', 'player_one_id', 'club_player_one_id', 'event_type_one_id', 'created_by'], 'required'],
            [['type_time'], 'string'],
            [['soccer_match_id', 'player_one_id', 'player_two_id', 'club_player_one_id', 'club_player_two_id', 'event_type_one_id', 'event_type_two_id', 'created_by', 'updated_by'], 'integer'],
            [['event_time_exactly', 'event_time_start', 'event_time_end', 'created_at', 'updated_at'], 'safe'],
            [['club_player_one_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_player_one_id' => 'id']],
            [['club_player_two_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_player_two_id' => 'id']],
            [['event_type_one_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypesSoccerMatchEvents::className(), 'targetAttribute' => ['event_type_one_id' => 'id']],
            [['event_type_two_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypesSoccerMatchEvents::className(), 'targetAttribute' => ['event_type_two_id' => 'id']],
            [['player_one_id'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['player_one_id' => 'id']],
            [['player_two_id'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['player_two_id' => 'id']],
            [['soccer_match_id'], 'exist', 'skipOnError' => true, 'targetClass' => SoccerMatch::className(), 'targetAttribute' => ['soccer_match_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_time' => Yii::t('app', 'Type Time'),
            'soccer_match_id' => Yii::t('app', 'Soccer Match ID'),
            'player_one_id' => Yii::t('app', 'Player One ID'),
            'player_two_id' => Yii::t('app', 'Player Two ID'),
            'club_player_one_id' => Yii::t('app', 'Club Player One ID'),
            'club_player_two_id' => Yii::t('app', 'Club Player Two ID'),
            'event_type_one_id' => Yii::t('app', 'Event Type One ID'),
            'event_type_two_id' => Yii::t('app', 'Event Type Two ID'),
            'event_time_exactly' => Yii::t('app', 'Event Time Exactly'),
            'event_time_start' => Yii::t('app', 'Event Time Start'),
            'event_time_end' => Yii::t('app', 'Event Time End'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[ClubPlayerOne]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\ClubQuery
     */
    public function getClubPlayerOne()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_player_one_id']);
    }

    /**
     * Gets query for [[ClubPlayerTwo]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\ClubQuery
     */
    public function getClubPlayerTwo()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_player_two_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[EventTypeOne]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\TypesSoccerMatchEventsQuery
     */
    public function getEventTypeOne()
    {
        return $this->hasOne(TypesSoccerMatchEvents::className(), ['id' => 'event_type_one_id']);
    }

    /**
     * Gets query for [[EventTypeTwo]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\TypesSoccerMatchEventsQuery
     */
    public function getEventTypeTwo()
    {
        return $this->hasOne(TypesSoccerMatchEvents::className(), ['id' => 'event_type_two_id']);
    }

    /**
     * Gets query for [[PlayerOne]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\PlayerQuery
     */
    public function getPlayerOne()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_one_id']);
    }

    /**
     * Gets query for [[PlayerTwo]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\PlayerQuery
     */
    public function getPlayerTwo()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_two_id']);
    }

    /**
     * Gets query for [[SoccerMatch]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\SoccerMatchQuery
     */
    public function getSoccerMatch()
    {
        return $this->hasOne(SoccerMatch::className(), ['id' => 'soccer_match_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\RelEventSoccerMatchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\RelEventSoccerMatchQuery(get_called_class());
    }
}
