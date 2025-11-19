
<?php
    use yii\bootstrap5\Html;
?>


<nav class="navbar fixed-top navbar-expand-lg birun-nav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <?= Html::img('@web/assets/logos/aktivlogowhite.png', ['alt' => 'AKTIV logo', 'class' => 'position-relative d-inline-block align-middle', 'width' => '120px', 'height' => '30px']) ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= \yii\helpers\Url::to(['pages/about']) ?>"><?= Yii::t('app', 'About us') ?></a></li>
                <li class="nav-item dropdown">
                    <a id="legalDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?= Yii::t('app', 'For legal entities') ?><i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="legalDropdown1">
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Express Delivery') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Courier Service') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'International Mail') ?></a></li> </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="servicesDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= Yii::t('app', 'Services') ?> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown1">
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Express Delivery') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Courier Service') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'International Mail') ?></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= \yii\helpers\Url::to(['/my-orders']) ?>"><?= Yii::t('app', 'My Orders') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= \yii\helpers\Url::to(['pages/prices']) ?>"><?= Yii::t('app', 'Prices') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= \yii\helpers\Url::to(['pages/addresses']) ?>"><?= Yii::t('app', 'Our addresses') ?></a></li>
<!--                <li class="nav-item"><a class="nav-link" href="--><?php //= \yii\helpers\Url::to(['site/contact']) ?><!--">--><?php //= Yii::t('app', 'Contact') ?><!--</a></li>-->
            </ul>
        </div>
        <!-- Desktop Actions -->
        <div class="header-actions d-none d-lg-flex align-items-center gap-2 ms-auto">

            <!-- There should go switch button -->
            <div class="header_lang-btn dropdown">
                <button class="btn btn-secondary dropdown-toggle d-flex justify-content-center align-items-center rounded-pill bg-white text-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span> <?= strtoupper(Yii::$app->language) ?></span> <i class="fa-solid fa-angle-down ms-1"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/uz">O'zbek</a></li>
                    <li><a class="dropdown-item" href="/uz_cyrl">Ўзбекча</a></li>
                    <li><a class="dropdown-item" href="/en">English</a></li>
                    <li><a class="dropdown-item" href="/ru">Русский</a></li>
                </ul>
            </div>

            <!-- There should end switch button -->

            <button type="button" class="btn btn-primary header_login-btn"
                    data-bs-toggle="modal" data-bs-target="#loginModal">
                    <?= Yii::t('app', 'Login') ?>
            </button>
        </div>
    </div>
</nav>

