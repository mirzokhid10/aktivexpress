<?php

namespace app\controllers;

use yii\web\Controller;

class PagesController extends Controller
{
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionMyOrders() {
        return $this->render('my-orders/index');
    }

    public function actionAddresses() {
        return $this->render('addresses');
    }

    public function actionTariffs() {
        return $this->render('tariffs');
    }
}