<?php

$addresses = require Yii::getAlias('@app/migrations/data/addresses.php');
$tashkentAddresses = array_filter($addresses, fn($item) => strtolower($item['city']) === 'toshkent');
$otherAddresses = array_filter($addresses, fn($item) => strtolower($item['city']) !== 'toshkent');

$this->title = Yii::t('app', 'Our Addresses');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="birun-address-block">

    <?= $this->render('/site/components/_pageHeader', [
        'title' => Yii::t('address', 'Our Addresses'),
        'breadcrumbs' => $this->params['breadcrumbs'],
    ]) ?>

    <div class="card">
        <div class="main-card p-4">
            <!-- Page Header -->
            <div class="mb-5">
                <p class="mb-2 fw-semibold small custom-orange">
                    <?= Yii::t('address', 'Our Addresses') ?>
                </p>
                <h1 class="display-6 fw-normal mb-3">
                    <?= Yii::t('address', 'Visit our offices') ?>
                </h1>
                <p class="fs-6">
                    <?= Yii::t('address', 'All our branches work from', ['time' => '09:00 - 19:00']) ?>
                    <span class="custom-orange fw-bold">09:00 - 19:00</span>

                </p>
            </div>


            <!-- Section Title -->
            <h2 class="h4 fw-normal mb-4">Toshkent shahri</h2>

            <!-- Address Cards Grid -->
            <div class="row g-4">
                <?php foreach ($tashkentAddresses as $item): ?>
                    <?= \app\widgets\AddressCardWidget::widget(['item' => $item]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="main-card p-4">
            <!-- Page Header -->
            <div class="mb-5">
                <p class="mb-2 fw-semibold small custom-orange"><?= Yii::t('address', 'Our Addresses') ?></p>
                <h1 class="display-6 fw-normal mb-3"><?= Yii::t('address', 'Across the Republic') ?></h1>
                <p class="fs-6">
                    <?= Yii::t('address', 'All our branches work from', ['time' => '09:00 - 19:00']) ?>
                    <span class="custom-orange fw-bold">09:00 - 19:00</span>
                </p>
            </div>

            <!-- Address Cards Grid -->
            <div class="row g-4">
                <?php foreach ($otherAddresses as $item): ?>
                    <?= \app\widgets\AddressCardWidget::widget(['item' => $item]) ?>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>