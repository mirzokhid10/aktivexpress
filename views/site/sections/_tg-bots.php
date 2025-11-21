<?php
use yii\bootstrap5\Html;
?>

<div class="birun-contact-us">
    <h1 class="birun-block-header"><?= Yii::t('tgbot', 'Telegram bot features') ?></h1>

    <div class="row g-3">
        <!-- LEFT COLUMN -->
        <div class="col-12 col-lg-5">
            <div class="d-flex flex-column justify-content-start align-items-start gap-4 custom-bg-blue rounded-2 p-4 h-100">
                <h3 class="text-white"><?= Yii::t('tgbot', 'Your fast, convenient and reliable assistant!') ?></h3>

                <div class="d-flex flex-column justify-content-start gap-2">
                    <span class="fs-16 text-white">@aktivexpressbot</span>
                    <?= Html::img('@web/assets/logos/tg_bot.png', [
                        'alt' => 'tg bot',
                        'class' => 'img-fluid',
                        'style' => 'max-width: 200px;'
                    ]) ?>
                </div>

                <a href="https://t.me/aktivexpressbot" id="btn-more"
                   class="btn py-3 text-white fw-medium rounded-3 custom-bg-orange d-flex gap-2 align-items-center">
                    <i class="bi bi-telegram"></i>
                    <span><?= Yii::t('tgbot', 'Go to Telegram bot') ?></span>
                </a>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-12 col-lg-7">

            <!-- TOP ROW (3 cards) -->
            <div class="row g-3 mb-0">
                <div class="col-12 col-lg-4">
                    <div class="tg-feature-card card h-100 p-3 p-md-4 d-flex flex-column rounded-2">
                        <div class="d-inline-flex">
                            <?= Html::img('@web/assets/logos/icons/edit.png', [
                                'alt' => 'Submit request icon',
                                'class' => 'img-fluid',
                                'style' => 'max-width: 48px;'
                            ]) ?>
                        </div>
                        <p class="fs-5 custom-blue fw-bold mt-3 mb-1"><?= Yii::t('tgbot', 'Submit a request') ?></p>
                        <p class="fs-6 custom-gray m-0"><?= Yii::t('tgbot', 'Create and send delivery requests quickly through the bot') ?></p>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="tg-feature-card card h-100 p-3 p-md-4 d-flex flex-column rounded-2">
                        <div class="d-inline-flex">
                            <?= Html::img('@web/assets/logos/icons/eye.png', [
                                'alt' => 'Track shipments icon',
                                'class' => 'img-fluid',
                                'style' => 'max-width: 48px;'
                            ]) ?>
                        </div>
                        <p class="fs-5 custom-blue fw-bold mt-3 mb-1"><?= Yii::t('tgbot', 'Track shipments') ?></p>
                        <p class="fs-6 custom-gray m-0"><?= Yii::t('tgbot', 'Monitor your parcel status in real-time') ?></p>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="tg-feature-card card h-100 p-3 p-md-4 d-flex flex-column rounded-2">
                        <div class="d-inline-flex">
                            <?= Html::img('@web/assets/logos/icons/phone.png', [
                                'alt' => 'Contact icon',
                                'class' => 'img-fluid',
                                'style' => 'max-width: 48px;'
                            ]) ?>
                        </div>
                        <p class="fs-5 custom-blue fw-bold mt-3 mb-1"><?= Yii::t('tgbot', 'Contact us') ?></p>
                        <p class="fs-6 custom-gray m-0"><?= Yii::t('tgbot', 'Get instant support and answers to your questions') ?></p>
                    </div>
                </div>
            </div>

            <!-- BOTTOM ROW (2 cards) -->
            <div class="row g-3 mt-0">
                <div class="col-12 col-md-6">
                    <div class="tg-feature-card card h-100 p-3 p-md-4 d-flex flex-column rounded-2">
                        <div class="d-inline-flex">
                            <?= Html::img('@web/assets/logos/icons/money.png', [
                                'alt' => 'Price icon',
                                'class' => 'img-fluid',
                                'style' => 'max-width: 48px;'
                            ]) ?>
                        </div>
                        <p class="fs-5 custom-blue fw-bold mt-3 mb-1"><?= Yii::t('tgbot', 'Price information') ?></p>
                        <p class="fs-6 custom-gray m-0"><?= Yii::t('tgbot', 'Check delivery rates and calculate costs instantly') ?></p>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="tg-feature-card card h-100 p-3 p-md-4 d-flex flex-column rounded-2">
                        <div class="d-inline-flex">
                            <?= Html::img('@web/assets/logos/icons/smile.png', [
                                'alt' => 'About company icon',
                                'class' => 'img-fluid',
                                'style' => 'max-width: 48px;'
                            ]) ?>
                        </div>
                        <p class="fs-5 custom-blue fw-bold mt-3 mb-1"><?= Yii::t('tgbot', 'About the company') ?></p>
                        <p class="fs-6 custom-gray m-0"><?= Yii::t('tgbot', 'Learn more about our services and company') ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
