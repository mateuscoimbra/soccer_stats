<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "player_position".
 *
 * @property int $id
 * @property string $player_position
 *
 * @property Player[] $players
 */
class PlayerPosition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['player_position'], 'required'],
            [['player_position'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'player_position' => Yii::t('app', 'Player Position'),
        ];
    }

    /**
     * Gets query for [[Players]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\PlayerQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['position_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\PlayerPositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\PlayerPositionQuery(get_called_class());
    }
}
