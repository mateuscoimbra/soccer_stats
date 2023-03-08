<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "player".
 *
 * @property int $id
 * @property string $full_name
 * @property string $birth_date
 * @property string $birthplace
 * @property float $height
 * @property float $weight
 * @property int $country_id
 * @property int $position_id
 * @property resource $image_profile
 * @property string $strong_foot
 * @property int $created_by
 * @property string $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 *
 * @property Country $country
 * @property User $createdBy
 * @property PlayerPosition $position
 * @property RelEventSoccerMatch[] $relEventSoccerMatches
 * @property RelEventSoccerMatch[] $relEventSoccerMatches0
 * @property User $updatedBy
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        
        return [
            [['full_name', 'birth_date', 'birthplace', 'height', 'weight', 'country_id', 'position_id', 'strong_foot', 'created_by'], 'required'],
            [['birth_date', 'created_at', 'updated_at'], 'safe'],
            [['height', 'weight'], 'number'],
            [['country_id', 'position_id', 'created_by', 'updated_by'], 'integer'],
            [['image_profile', 'strong_foot'], 'string'],
            [['full_name'], 'string', 'max' => 255],
            [['birthplace'], 'string', 'max' => 100],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlayerPosition::className(), 'targetAttribute' => ['position_id' => 'id']],
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
            'full_name' => Yii::t('app', 'Full Name'),
            'birth_date' => Yii::t('app', 'Birth Date'),
            'birthplace' => Yii::t('app', 'Birthplace'),
            'height' => Yii::t('app', 'Height'),
            'weight' => Yii::t('app', 'Weight'),
            'country_id' => Yii::t('app', 'Country ID'),
            'position_id' => Yii::t('app', 'Position ID'),
            'image_profile' => Yii::t('app', 'Image Profile'),
            'strong_foot' => Yii::t('app', 'Strong Foot'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\PlayerPositionQuery
     */
    public function getPosition()
    {
        return $this->hasOne(PlayerPosition::className(), ['id' => 'position_id']);
    }

    /**
     * Gets query for [[RelEventSoccerMatches]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\RelEventSoccerMatchQuery
     */
    public function getRelEventSoccerMatches()
    {
        return $this->hasMany(RelEventSoccerMatch::className(), ['player_one_id' => 'id']);
    }

    /**
     * Gets query for [[RelEventSoccerMatches0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\RelEventSoccerMatchQuery
     */
    public function getRelEventSoccerMatches0()
    {
        return $this->hasMany(RelEventSoccerMatch::className(), ['player_two_id' => 'id']);
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
     * @return \app\models\activequery\PlayerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\PlayerQuery(get_called_class());
    }
}
