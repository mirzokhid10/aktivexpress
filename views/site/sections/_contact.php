<div class="birun-contact-us">
    <h1 class="birun-block-header"><?= Yii::t('order', 'Contact us and working hours') ?></h1>
    <div class="row g-3">
        <div class="col-md-7">
            <div class="card h-100">
                <div class="card-body padding-15-rem">
                    <div class="text-start">
                        <div class="d-inline-flex align-items-start justify-content-start bg-white rounded-3 mb-4" style="width: 64px; height: 64px;">
                            <?= \yii\bootstrap5\Html::img('@web/assets/logos/contact_us_phone.png', ['alt' => 'logo', 'class' => '']) ?>
                        </div>
                    </div>

                    <p class="contact-us-title text-start"><?= Yii::t('order', 'Our phone numbers:') ?></p>
                    <div class="row mt-4">
                        <div class="col-md-6 d-flex flex-column justify-content-between">
                            <p class="contact-us-title-mini"><?= Yii::t('order', 'Main contact:') ?></p>
                            <p class="contact-us-phone">+998 93 184 77 33</p>
                        </div>
                        <div class="col-md-6">
                            <p class="contact-us-title-mini"><?= Yii::t('order', 'Legal clients and international mail:') ?></p>
                            <p class="contact-us-phone">+998 99 724 77 44</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card h-100 card-bg-blue">
                <div class="card-body d-flex align-items-center justify-content-center text-start">
                    <p class="font-size-32p m-0" style="line-height: 1.3;"><?= Yii::t('order', 'Contact us - we are always in touch :)') ?></p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body padding-15-rem d-flex flex-column justify-content-between">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="width: 48px; height: 48px; background-color: #FF6010;">
                        <?= \yii\bootstrap5\Html::img('@web/assets/logos/contact_us_time.png', ['alt' => 'logo', 'class' => '']) ?>
                    </div>
                    <div>
                        <p class="contact-us-title"><?= Yii::t('order', 'Working hours:') ?></p>
                        <p class="contact-us-title-mini"><?= Yii::t('order', 'Monday - Sunday') ?></p>
                        <p class="contact-us-phone">09:00 - 18:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body padding-15-rem d-flex flex-column justify-content-between">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="width: 48px; height: 48px; background-color: #FF6010;">
                        <?= \yii\bootstrap5\Html::img('@web/assets/logos/contact_us_map.png', ['alt' => 'logo', 'class' => '']) ?>
                    </div>
                    <div>
                        <p class="contact-us-title"><?= Yii::t('order', 'Head office address') ?></p>
                        <p class="contact-us-phone" style="font-size: 18px; line-height: 1.4;"><?= Yii::t('order', "9-10, Dilxush 1 st, Sergeli District, Tashkent") ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body padding-15-rem d-flex flex-column justify-content-between">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="width: 48px; height: 48px; background-color: #FF6010;">
                        <?= \yii\bootstrap5\Html::img('@web/assets/logos/contact_us_social.png', ['alt' => 'logo', 'class' => '']) ?>
                    </div>
                    <div>
                        <p class="contact-us-title"><?= Yii::t('order', 'Email and social networks:') ?></p>
                        <p class="contact-us-link"><a href="https://www.facebook.com/aktivexpress/">facebook</a></p>
                        <p class="contact-us-link"><a href="https://www.instagram.com/aktivexpress/">instagram</a></p>
                        <p class="contact-us-link"><a href="https://x.com/aktivexpress">twitter</a></p>
                        <p class="contact-us-link"><a href="https://www.linkedin.com/company/aktivexpress/?originalSubdomain=uz">linkedin</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>