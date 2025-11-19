<?php
use yii\helpers\Url;

$this->title = Yii::t('app', 'About us');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="birun-address-block">

    <div class="birun-block-header my-5 py-5">
        <?= yii\bootstrap5\Breadcrumbs::widget([
            'links' => $this->params['breadcrumbs'] ?? [],
            'options' => ['class' => 'breadcrumb'], // optional Bootstrap class
        ]) ?>
        <h1 class=""><?= Yii::t('app', 'About us') ?></h1>
    </div>
    <div class="card">
        <div class="main-card p-4">
            <div class="mb-5">
                <h1 class="display-6 fw-normal mb-3">
                    <?= Yii::t('about', 'Aktiv Express') ?>
                </h1>
            </div>

            <div class="d-flex flex-column gap-2">
                <p class="fs-16 custom-gray">
                    <?= Yii::t('about', '"Aktiv Express Cargo" Limited Liability Company was established in August 2019. Its core activity is postal and courier services. It has 16 branches throughout the Republic and a main head office in Tashkent city. When the company started operating in 2019, it began with 10 vehicles, and today the company has 40 vehicles in its own fleet.') ?>
                </p>
                <p class="fs-16 custom-gray">
                    <?= Yii::t('about', 'The company is implementing measures such as increasing employee efficiency and introducing modern IT technologies to provide better services to clients. It is constantly working to improve service quality so that the client receives their mail on time.') ?>
                </p>
            </div>

            <div class="container py-4">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="gallery-item">
                            <span class="gallery-badge">
                                <?= Yii::t('about', 'Head Office') ?>
                            </span>
                            <img src="<?= Url::to('@web/assets/logos/aboutusimage.png') ?>" alt="Arhan Palace - AKTIV Main Office">
                            <div class="gallery-overlay">
                                <h5>Arhan Palace Office</h5>
                                <p><?= Yii::t('about', 'Convenient location providing comprehensive banking and money transfer services to our community') ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="gallery-item">
                            <span class="gallery-badge">
                                <?= Yii::t('about', 'Branch Office') ?>
                            </span>
                            <img src="<?= Url::to('@web/assets/logos/aboutusimage1.png') ?>" alt="AKTIV Branch Location">
                            <div class="gallery-overlay">
                                <h5>City Branch Office</h5>
                                <p><?= Yii::t('about', 'Convenient location providing comprehensive banking and money transfer services to our community') ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="gallery-item">
                            <span class="gallery-badge">
                                <?= Yii::t('about', 'Service Center') ?>
                            </span>
                            <img src="<?= Url::to('@web/assets/logos/aboutusimage2.png') ?>" alt="AKTIV Customer Service Center">
                            <div class="gallery-overlay">
                                <h5>Customer Service Center</h5>
                                <p><?= Yii::t('about', 'Convenient location providing comprehensive banking and money transfer services to our community') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card my-5">
        <div class="main-card p-4">
            <div class="row d-flex justify-content-between align-items-stretch">
                <div class="col-12 col-md-5 col-lg-5 d-flex align-items-center justify-content-center card-bg-blue rounded-4 mt-4 mt-sm-4 mt-md-0 mb-sm-0 mb-md-0 p-5 order-2 order-md-1">
                    <img src="<?= Url::to('@web/assets/logos/aktivlogowhite.png') ?>" alt="Company Logo" class="img-fluid">
                </div>
                <div class="col-12 col-md-7 col-lg-6 d-flex flex-column justify-content-center order-1 order-md-2 py-5">
                    <div class="mb-4">
                        <p class="custom-orange fs-16 mb-2">
                            <?= Yii::t('about', 'We have helped hundreds of companies') ?>
                        </p>
                        <h1 class="display-6 fw-normal mb-3">
                            <?= Yii::t('about', 'Our statistics') ?>
                        </h1>
                        <p class="custom-gray fs-16 d-md-none mb-4">
                            <?= Yii::t('about', 'The company is implementing measures such as increasing employee efficiency and introducing modern IT technologies to provide better services to clients. It is constantly working to improve service quality so that the client receives their mail on time.') ?>
                        </p>
                    </div>
                    <div class="row g-4">
                        <div class="col-6">
                            <h1 class="display-6 fw-bold custom-blue mb-2">50+</h1>
                            <p class="custom-orange fs-16 mb-0"> <?= Yii::t('about','Cities and districts with branches')?></p>
                        </div>
                        <div class="col-6">
                            <h1 class="display-6 fw-bold custom-blue mb-2">200,000+</h1>
                            <p class="custom-orange fs-16 mb-0"> <?= Yii::t('about','Delivered parcels')?></p>
                        </div>
                        <div class="col-6">
                            <h1 class="display-6 fw-bold custom-blue mb-2">98%</h1>
                            <p class="custom-orange fs-16 mb-0"> <?= Yii::t('about','Customer satisfaction rate')?></p>
                        </div>
                        <div class="col-6">
                            <h1 class="display-6 fw-bold custom-blue mb-2">10+</h1>
                            <p class="custom-orange fs-16 mb-0"> <?= Yii::t('about','Years of experience in logistics')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5">
        <h1 class="display-6 fw-normal mb-3">
            <?= Yii::t('about', '2025 Plan') ?>
        </h1>
        <p class="custom-gray fs-16">
            <?= Yii::t('about', 'Starting from 2025, to make it easier for our customers to use the company\'s services:') ?>
        </p>

        <div class="card">
            <div class="main-card p-4">
                <div class="row d-flex align-items-center justify-content-evenly py-4">

                    <div class="col-12 col-sm-12 col-md-3 text-center d-flex flex-column gap-4">
                        <img class="card_icon-img mx-auto" src="<?= Url::to('@web/assets/logos/icons/home.png') ?>">
                        <h4 class="custom-blue fs-16 fw-bold">
                            <?= Yii::t('about', 'Increasing the number of branches – "Our service is even closer!"') ?>
                        </h4>
                        <p class="custom-gray fs-16">
                            <?= Yii::t('about', 'In 2025, new branches will be opened, creating an opportunity to provide even more convenient service to our customers.') ?>
                        </p>
                    </div>

                    <div class="col-12 col-sm-12 col-md-3 text-center d-flex flex-column gap-4">
                        <img class="card_icon-img mx-auto" src="<?= Url::to('@web/assets/logos/icons/user.png') ?>">
                        <h4 class="custom-blue fs-16 fw-bold">
                            <?= Yii::t('about', 'Mobile application for courier services – "Fast and reliable delivery!"') ?>
                        </h4>
                        <p class="custom-gray fs-16">
                            <?= Yii::t('about', 'Tracking and managing orders will be easier through the mobile application, and our services will be even more efficient.') ?>
                        </p>
                    </div>

                    <div class="col-12 col-sm-12 col-md-3 text-center d-flex flex-column gap-4">
                        <img class="card_icon-img mx-auto" src="<?= Url::to('@web/assets/logos/icons/mobile.png') ?>">
                        <h4 class="custom-blue fs-16 fw-bold">
                            <?= Yii::t('about', 'Mobile application for customers – "Our services at your fingertips!"') ?>
                        </h4>
                        <p class="custom-gray fs-16">
                            <?= Yii::t('about', 'The opportunity to place and track orders through a special mobile application will be created, and every shipment will be under control.') ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
