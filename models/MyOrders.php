<?php

namespace app\models;

use yii\db\ActiveRecord;

class MyOrders extends ActiveRecord
{
    public static function tableName() {
        return '{{%my_orders}}';
    }
}