<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Users extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }

    /**
     * Rules
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['phone'], 'string', 'max' => 15],

            // Accept both: 998901234567 OR +998901234567
            ['phone', 'match', 'pattern' => '/^\+?998[0-9]{9}$/',
                'message' => 'Telefon raqam noto‘g‘ri formatda'],

            [['otp_code'], 'string', 'max' => 10],
            [['otp_expires_at'], 'integer'],

            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * Auto timestamps
     */
    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = time();
        }
        $this->updated_at = time();

        return parent::beforeSave($insert);
    }

    /**
     * Normalize phone number: +998901234567 → 998901234567
     */
    public function beforeValidate()
    {
        if ($this->phone) {
            $this->phone = preg_replace('/\D/', '', $this->phone);

            if (strpos($this->phone, '998') !== 0) {
                $this->phone = '998' . $this->phone;
            }
        }

        return parent::beforeValidate();
    }

    /**
     * IdentityInterface implementation
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // not used for OTP login
    }

    public static function findByPhone($phone)
    {
        $phone = preg_replace('/\D/', '', $phone);
        if (strpos($phone, '998') !== 0) {
            $phone = '998' . $phone;
        }
        return static::findOne(['phone' => $phone]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    /**
     * OTP helper functions
     */
    public function generateOtp()
    {
        $this->otp_code = rand(10000, 99999);
        $this->otp_expires_at = time() + 300; // valid 5 minutes
        return $this->otp_code;
    }

    public function isOtpValid($code)
    {
        if ($this->otp_code != $code)
            return false;

        if ($this->otp_expires_at < time())
            return false;

        return true;
    }
}
