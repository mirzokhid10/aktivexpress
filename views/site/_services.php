
<div class="birun-service-block">
    <h1 class="birun-block-header"><?= Yii::t('serv', 'Our Services') ?></h1>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <?= \yii\bootstrap5\Html::img('@web/assets/logos/service_parcel.png', ['alt' => 'logo']) ?>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card h100-p">
                <div class="card-body">
                    <?= \yii\bootstrap5\Html::img('@web/assets/logos/service_box_parcel.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>
                    <p class="birun-blue-text"><?= Yii::t('serv', 'Safe and secure packaging') ?></p>
                    <p class="birun-gray-text w70-p"><?= Yii::t('serv', 'Your parcel will be delivered without damage or harm.') ?></p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card h100-p">
                <div class="card-body">
                    <?= \yii\bootstrap5\Html::img('@web/assets/logos/programm.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>
                    <p class="birun-blue-text"><?= Yii::t('serv', 'Convenient payment system') ?></p>
                    <p class="birun-gray-text w70-p"><?= Yii::t('serv', 'Payment can be made by the sender or the recipient.') ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h100-p">
                <div class="card-body">
                    <?= \yii\bootstrap5\Html::img('@web/assets/logos/human.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>

                    <p class="birun-blue-text"><?= Yii::t('serv', 'Courier service') ?></p>
                    <p class="birun-gray-text w70-p mb-0"><?= Yii::t('serv', 'We will pick up your parcel from you or deliver it directly to the address.') ?></p>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card h100-p">
                <div class="card-body">
                    <?= \yii\bootstrap5\Html::img('@web/assets/logos/transport.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>

                    <p class="birun-blue-text"><?= Yii::t('serv', 'Transportation of bulky goods') ?></p>
                    <p class="birun-gray-text w70-p"><?= Yii::t('serv', 'We deliver your large cargo quickly and reliably.') ?></p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-5">
            <div class="card h100-p">
                <div class="card-body">
                    <?= \yii\bootstrap5\Html::img('@web/assets/logos/refresh.png', ['alt' => 'logo', 'class' => 'birun-service-icon']) ?>
                    <p class="birun-blue-text"><?= Yii::t('serv', 'Cashback for loyal customers') ?></p>
                    <p class="birun-gray-text w70-p"><?= Yii::t('serv', 'Delivery is more profitable with us!') ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card h100-p card-bg-blue">
                <div class="card-body card-radius-08 text-center">
                    <p class="font-size-40p"><?= Yii::t('serv', 'Convenient and reliable postal services for you!') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>