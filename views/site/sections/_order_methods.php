<div class="birun-order-block">
    <h1 class="birun-block-header"><?= Yii::t('order', 'Convenient ways to order') ?></h1>
    <div class="card birun-order-card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="order-box">
                                <?= \yii\bootstrap5\Html::img('@web/assets/logos/call.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>
                                <p class="birun-blue-text"><?= Yii::t('order', 'Order via Call Center') ?></p>
                                <p class="birun-gray-text"><?= Yii::t('order', 'To contact us:') ?> <br>+998 93 184 77 33</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="order-box">
                                <?= \yii\bootstrap5\Html::img('@web/assets/logos/telegram.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>

                                <p class="birun-blue-text"><?= Yii::t('order', 'Fast order via Telegram bot') ?></p>
                                <p class="birun-gray-text"><?= Yii::t('order', 'Easily and quickly place an order using our bot.') ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="order-box">
                                <?= \yii\bootstrap5\Html::img('@web/assets/logos/globus.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>

                                <p class="birun-blue-text"><?= Yii::t('order', 'Online order via Website') ?></p>
                                <p class="birun-gray-text"><?= Yii::t('order', "Fill out the form conveniently on our website, formalize the shipment.") ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="order-box">
                                <?= \yii\bootstrap5\Html::img('@web/assets/logos/home.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>

                                <p class="birun-blue-text"><?= Yii::t('order', 'Visit our offices') ?></p>
                                <p class="birun-gray-text"><?= Yii::t('order', 'Come to our offices and use the services in person.') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>