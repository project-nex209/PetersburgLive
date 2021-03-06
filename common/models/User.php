<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_ADMIN = 20;
    public $newPassword;
    public $photoFile;




    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_ADMIN]],
            ['newPassword', 'string', 'min'=>6],
            ['vk_id', 'integer'],
            [['photoFile'], 'file', 'extensions' => 'png, jpg'],
            ['email', 'email'],
            ['username', 'string'],
            ['phone', 'string'],
            ['photo', 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => [self::STATUS_ACTIVE, self::STATUS_ADMIN]]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function beforeSave($insert){
      if(parent::beforeSave($insert)){
        if($this->newPassword){
          $this->updatePassword($this->newPassword);
        }
        return true;
      } else {
        return false;
      }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => [self::STATUS_ACTIVE, self::STATUS_ADMIN]]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => [self::STATUS_ACTIVE, self::STATUS_ADMIN],
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function updatePassword($newPassword){
        $this->password_hash = Yii::$app->security->generatePasswordHash($newPassword);
    }

    public function updateEmail($newEmail){
      $this->email = $newEmail;
    }

    public function updateUsername($newUsername){
      $this->username = $newUsername;
    }

    public function updatePhone($newPhone){
      $this->phone = $newPhone;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function isUserAdmin($email){
      if (static::findOne(['email' => $email, 'status' => self::STATUS_ADMIN]))
    {
        return true;
    } else {
        return false;
    }
    }

    public function saveFromVk($uid,$username,$photo,$hash) {
        $user = User::find()->where(['vk_id'=>$uid])->one();
        if($user) {
            return Yii::$app->user->login($user);
        }
        $this->vk_id = $uid;
        $this->username = $username;
        $this->photo = $photo;
        $this->password_hash = $hash;
        $this->save();
        return Yii::$app->user->login($this);
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->photoFile->saveAs('uploads/user/' . $this->id .'_'. md5($this->photoFile->baseName) . '.' . $this->photoFile->extension);
            $this->photo = 'uploads/user/' . $this->id .'_'.  md5($this->photoFile->baseName) . '.' . $this->photoFile->extension;
            return true;
        } else {
            return false;
        }
    }
}
