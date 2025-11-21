<?php
use yii\bootstrap5\Html;
?>

<div class="birun-contact-us">
    <h1 class="birun-block-header"><?= Yii::t('faq', 'Frequently Asked Questions') ?></h1>

    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body rounded-4 d-flex flex-column gap-3">
                    <h3 class="fs-24 custom-blue fw-bold">
                        <?= Yii::t('faq', 'How many days does delivery take?') ?>
                    </h3>
                    <p class="fs-16 custom-gray fw-normal"><?=Yii::t('faq', 'It arrives at our offices within 1–2 days.')?></p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body rounded-4 d-flex flex-column gap-3">
                    <h3 class="fs-24 custom-blue fw-bold">
                        <?= Yii::t('faq', 'Where are your branches located?') ?>
                    </h3>
                    <p class="fs-16 custom-gray fw-normal"><?=Yii::t('faq', 'We have one office in each regional capital.')?></p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body rounded-4 d-flex flex-column gap-3">
                    <h3 class="fs-24 custom-blue fw-bold">
                        <?= Yii::t('faq', 'Do you offer city or district delivery?') ?>
                    </h3>
                    <p class="fs-16 custom-gray fw-normal"><?=Yii::t('faq', 'We have one office in each regional capital.')?></p>
                </div>
            </div>
        </div>
    </div>
</div>
