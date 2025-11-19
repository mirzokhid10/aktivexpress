<?php

namespace app\widgets;

use yii\base\Widget;

class AddressCardWidget extends Widget
{
    public $item;

    public function run()
    {
        return $this->render('address-card', [
            'item' => $this->item
        ]);
    }
}