<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "league_competition".
 *
 * @property int $id
 * @property string $league_competition
 */
class LeagueCompetition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'league_competition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['league_competition'], 'required'],
            [['league_competition'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'league_competition' => Yii::t('app', 'League Competition'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\LeagueCompetitionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\LeagueCompetitionQuery(get_called_class());
    }
}
