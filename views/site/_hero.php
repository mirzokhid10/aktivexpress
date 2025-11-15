<?php
use \yii\bootstrap5\Html;
?>

<div class="row">
    <div class="col-md-5 p-0">
        <div class="birun-head-text">
            <h1><?= Yii::t('hero', 'Your reliable partner') ?></h1>
            <p><?= Yii::t('hero', 'We are your trusted assistant in all postal and logistics matters') ?></p>
            <form class="row g-3 birun-search-barcode">
                <div class="col-auto">
<!--                    <label for="searchBarcode" class="visually-hidden">Trek raqamingizni kiriting</label>-->
                    <input type="text" class="form-control" placeholder="<?= Yii::t('hero', 'Enter your tracking number') ?>" disabled>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-search-barcode mb-3" ><?= Yii::t('hero', 'Search') ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-7">
        <div class="birun-head-img">
            <?= Html::img('@web/assets/logos/head-img.png', ['class'=>'position-relative w-100', 'alt' => 'logo']) ?>
        </div>
    </div>
</div>