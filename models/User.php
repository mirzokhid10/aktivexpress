<?php

namespace app\models;

use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['phone'], 'string', 'max' => 20],
            [['access_token', 'auth_key'], 'safe'],
            [['external_id'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /* IdentityInterface required methods */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

}
