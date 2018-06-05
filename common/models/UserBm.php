<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user_rrhh".
 *
 * @property integer $id_bm
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email_bm
 * @property integer $status
 * @property integer $role

 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 */
class UserBm extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_bm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_key', 'password_hash', 'email_bm'], 'required'],
            [['status', 'role_id',], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email_rrhh', 'password'], 'string', 'max' => 255],
            [['email_rrhh'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bm' => 'Id Rrhh',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email_rrhh' => 'Email Rrhh',
            'status' => 'Status',
            'role_id_rrhh' => 'Role Id Rrhh',
            'user_type_id_rrhh' => 'User Type Id Rrhh',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findByUsername($username)
      {
        return static::findOne(['email_bm' => $username, 'status' =>
        1]);
      }

      public static function findIdentityByAccessToken($token, $type = null)
    {
      return static::findOne(['auth_key' => $token]);
    }


    public function validatePassword($password)
    {
        if ($password===$this->password){
          return true;
        }else {
          return false;
        }
        //return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
      {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
      }

      public function generateAuthKey()
      {
        $this->auth_key = Yii::$app->security->generateRandomString();
      }

      public function getId()
    {
      return $this->getPrimaryKey();
    }

    public function validateAuthKey($authKey)
    {
    return $this->getAuthKey() === $authKey;
    }


    public static function findIdentity($id)
    {
      return static::findOne(['id_bm' => $id, 'status' => 1]);
    }

    public function getAuthKey()
        {
        return $this->auth_key;
        }
}
