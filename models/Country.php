<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $phone_code
 * @property string $country_code
 * @property string $country_name
 *
 * @property Player[] $players
 * @property Stadium[] $stadia
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_code', 'country_code', 'country_name'], 'required'],
            [['phone_code', 'country_code'], 'string', 'max' => 10],
            [['country_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone_code' => Yii::t('app', 'Phone Code'),
            'country_code' => Yii::t('app', 'Country Code'),
            'country_name' => Yii::t('app', 'Country Name'),
        ];
    }

    /**
     * Gets query for [[Players]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\PlayerQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['country_id' => 'id']);
    }

    /**
     * Gets query for [[Stadia]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\StadiumQuery
     */
    public function getStadia()
    {
        return $this->hasMany(Stadium::className(), ['country_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\CountryQuery(get_called_class());
    }
}
