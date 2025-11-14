<?php
use \yii\bootstrap5\Html;
?>

<div class="row">
    <div class="col-md-5 p-0">
        <div class="birun-head-text">
            <h1>Sizning ishonchli hamkoringiz</h1>
            <p>Endi biz barcha pochta va logistika masalalarida sizning ishonchli yordamchingizmi</p>
            <form class="row g-3 birun-search-barcode">
                <div class="col-auto">
                    <label for="searchBarcode" class="visually-hidden">Trek raqamingizni kiriting</label>
                    <input type="text" class="form-control" id="searchBarcode" placeholder="Trek raqamingizni kiriting" disabled>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-search-barcode mb-3" disabled>Qidirish</button>
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