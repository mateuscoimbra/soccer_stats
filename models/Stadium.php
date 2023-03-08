<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stadium".
 *
 * @property int $id
 * @property string $stadium
 * @property int $capacity
 * @property int $country_id
 *
 * @property Country $country
 * @property SoccerMatch[] $soccerMatches
 */
class Stadium extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stadium';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stadium', 'capacity', 'country_id'], 'required'],
            [['capacity', 'country_id'], 'integer'],
            [['stadium'], 'string', 'max' => 100],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'stadium' => Yii::t('app', 'Stadium'),
            'capacity' => Yii::t('app', 'Capacity'),
            'country_id' => Yii::t('app', 'Country ID'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[SoccerMatches]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\SoccerMatchQuery
     */
    public function getSoccerMatches()
    {
        return $this->hasMany(SoccerMatch::className(), ['stadium_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\StadiumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\StadiumQuery(get_called_class());
    }
}
