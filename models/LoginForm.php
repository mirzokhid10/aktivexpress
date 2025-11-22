<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $phone;
    public $code;

    public function rules()
    {
        return [
            [['phone'], 'required', 'on' => 'phone'],
            ['phone', 'match', 'pattern' => '/^9989[012345789][0-9]{7}$/',
                'message' => 'Invalid Uzbekistan phone number format'],

            [['code'], 'required', 'on' => 'code'],
            ['code', 'string', 'length' => [4, 6]], // SMS codes are typically 4-6 digits
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => Yii::t('app', 'Phone number'),
            'code' => Yii::t('app', 'SMS Code'),
        ];
    }
}
