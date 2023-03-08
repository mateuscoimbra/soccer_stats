<?php

namespace app\models;

use PHPUnit\Framework\MockObject\Builder\Identity;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $cell_phone
 * @property string $email
 * @property resource|null $img
 * @property string $access_token
 * @property string|null $date_access_token
 * @property string|null $password_reset_token
 * @property int|null $is_validate
 * @property string|null $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Player[] $players
 * @property Player[] $players0
 * @property RelEventSoccerMatch[] $relEventSoccerMatches
 * @property RelEventSoccerMatch[] $relEventSoccerMatches0
 * @property SoccerMatch[] $soccerMatches
 * @property SoccerMatch[] $soccerMatches0
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'cell_phone', 'email'], 'required'],
            [['img', 'status'], 'string'],
            [['date_access_token', 'created_at', 'updated_at'], 'safe'],
            [['is_validate'], 'integer'],
            [['username'], 'string', 'max' => 55],
            [['password', 'access_token', 'password_reset_token'], 'string', 'max' => 120],
            [['cell_phone'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['cell_phone'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'cell_phone' => Yii::t('app', 'Cell Phone'),
            'email' => Yii::t('app', 'Email'),
            'img' => Yii::t('app', 'Image'),
            'access_token' => Yii::t('app', 'Access Token'),
            'date_access_token' => Yii::t('app', 'Date Access Token'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'is_validate' => Yii::t('app', 'Is Validate'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Players]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\PlayerQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Players0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\PlayerQuery
     */
    public function getPlayers0()
    {
        return $this->hasMany(Player::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[RelEventSoccerMatches]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\RelEventSoccerMatchQuery
     */
    public function getRelEventSoccerMatches()
    {
        return $this->hasMany(RelEventSoccerMatch::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[RelEventSoccerMatches0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\RelEventSoccerMatchQuery
     */
    public function getRelEventSoccerMatches0()
    {
        return $this->hasMany(RelEventSoccerMatch::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[SoccerMatches]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\SoccerMatchQuery
     */
    public function getSoccerMatches()
    {
        return $this->hasMany(SoccerMatch::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[SoccerMatches0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\activequery\SoccerMatchQuery
     */
    public function getSoccerMatches0()
    {
        return $this->hasMany(SoccerMatch::className(), ['updated_by' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\activequery\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activequery\UserQuery(get_called_class());
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface|null the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException();
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * The returned key is used to validate session and auto-login (if [[User::enableAutoLogin]] is enabled).
     *
     * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
     * other scenarios, that require forceful access revocation for old sessions.
     *
     * @return string|null a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey() {
        return $this->access_token;
    }

    /**
     * Validates the given auth key.
     *
     * @param string $authKey the given auth key
     * @return bool|null whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey) {
        return $this->access_token === $authKey;
    }

     /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->getAttribute('password'));
    }

    /**
     * Validates email
     * 
     * @param string $email email to validate
     * @return bool if email provided is valid
     */
    public static function findByEmail($email)
    {
        return static::findOne([
            'email' => $email,
            'is_validate' => 0,
            'status' => 'Ativo',

        ]);
    }

}
