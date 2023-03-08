<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "soccer_match".
 *
 * @property int $id
 * @property string $soccer_match
 * @property int $club_one_id
 * @property int $club_two_id
 * @property string $club_field_command
 * @property string $start_time
 * @property string $end_time
 * @property int $stadium_id
 * @property int $league_competition_id
 * @property string $result
 * @property int $created_by
 * @property string $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 *
 * @property Club $clubOne
 * @property Club $clubTwo
 * @property User $createdBy
 * @property LeagueCompetition $leagueCompetition
 * @property Stadium $stadium
 * @property User $updatedBy
 */
class SoccerMatch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'soccer_match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['soccer_match', 'club_one_id', 'club_two_id', 'club_field_command', 'start_time', 'end_time', 'stadium_id', 'league_competition_id', 'created_by'], 'required'],
            [['club_one_id', 'club_two_id', 'stadium_id', 'league_competition_id', 'created_by', 'updated_by'], 'integer'],
            [['club_field_command', 'result'], 'string'],
            [['start_time', 'end_time', 'created_at', 'updated_at'], 'safe'],
            [['soccer_match'], 'string', 'max' => 100],
            [['club_one_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_one_id' => 'id']],
            [['club_two_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_two_id' => 'id']],
            [['league_competition_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeagueCompetition::className(), 'targetAttribute' => ['league_competition_id' => 'id']],
            [['stadium_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stadium::className(), 'targetAttribute' => ['stadium_id' => 'id']],
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
            'soccer_match' => Yii::t('app', 'Soccer Match'),
            'club_one_id' => Yii::t('app', 'Club One ID'),
            'club_two_id' => Yii::t('app', 'Club Two ID'),
            'club_field_command' => Yii::t('app', 'Club Field Command'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'stadium_id' => Yii::t('app', 'Stadium ID'),
            'league_competition_id' => Yii::t('app', 'League Competition ID'),
            'result' => Yii::t('app', 'Result'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[ClubOne]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\ClubQuery
     */
    public function getClubOne()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_one_id']);
    }

    /**
     * Gets query for [[ClubTwo]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\ClubQuery
     */
    public function getClubTwo()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_two_id']);
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
     * Gets query for [[LeagueCompetition]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\LeagueCompetitionQuery
     */
    public function getLeagueCompetition()
    {
        return $this->hasOne(LeagueCompetition::className(), ['id' => 'league_competition_id']);
    }

    /**
     * Gets query for [[Stadium]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\StadiumQuery
     */
    public function getStadium()
    {
        return $this->hasOne(Stadium::className(), ['id' => 'stadium_id']);
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
     * @return \app\models\activequery\SoccerMatchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\SoccerMatchQuery(get_called_class());
    }
}
