<?php

use yii\helpers\Html;
use yii\bootstrap5\Breadcrumbs;

$this->title = Yii::t('app', 'Tariffs');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="birun-tariffs-block">
    <div class="text-start d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center my-sm-3 my-md-4 my-lg-5 py-5">
        <div class="mb-3 mb-sm-3 mb-md-0">
            <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'] ?? [],
                'options' => ['class' => 'breadcrumb'], // optional Bootstrap class
            ]) ?>
            <h1 class=""><?= Yii::t('app', 'Tariffs') ?></h1>
        </div>
        <div class="d-flex flex-column align-items-center bg-white p-4 rounded-2 tariffs-block_calc">
            <?= Html::img('@web/assets/logos/icons/calculator.png', ['alt' => 'calculator', 'class' => 'position-relative d-inline-block align-middle']) ?>
            <p class="fs-16 custom-gray"><?= Yii::t('calc', 'Calculator') ?></p>
            <button class="btn-login mb-0 px-5"><?= Yii::t('app', 'Calculation') ?></button>
        </div>
    </div>

    <div class="card">
        <div class="main-card p-4">
            <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                <h3 class="mb-0 fw-normal"><?= Yii::t('tariffs', 'Prices') ?> (01.01.2025)</h3>
                <span class="badge badge-orange px-3 py-2 rounded-pill"><?= Yii::t('tariffs', 'Prices excluding vat') ?></span>
                <span class="badge badge-green px-3 py-2 rounded-pill"><?= Yii::t('tariffs', 'Sum') ?></span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-header-gray">
                    <tr>
                        <th class="col-2 custom-gray-700 fw-semibold text-start"><?= Yii::t('tariffs', 'Service Type') ?></th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 0.5 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'from') ?> 1 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'from') ?> 5 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 5 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 20 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 50 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 100 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 250 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 500 kg</th>
                        <th class="col-1 custom-gray-700 fw-semibold"><?= Yii::t('tariffs', 'up to') ?> 1000 kg</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="table-header-gray text-start fw-medium custom-bg-gray"><?= Yii::t('tariffs', 'Service Type') ?></td>
                        <td>21 000</td>
                        <td>24 000</td>
                        <td>3 800</td>
                        <td>3 300</td>
                        <td>2 800</td>
                        <td>2 300</td>
                        <td>2 100</td>
                        <td>1 900</td>
                        <td>1 700</td>
                        <td>1 400</td>
                    </tr>
                    <tr>
                        <td class="table-header-gray text-start fw-medium text-wrap custom-bg-gray"><?= Yii::t('tariffs', 'Office Pickup') ?></td>
                        <td>21 000</td>
                        <td>23 000</td>
                        <td>23 000</td>
                        <td>25 000</td>
                        <td>45 000</td>
                        <td>68 000</td>
                        <td>85 000</td>
                        <td>135 000</td>
                        <td>225 000</td>
                        <td>+700<br><small><?= Yii::t('tariffs', 'sum_per_kg') ?></small></td>
                    </tr>
                    <tr>
                        <td class="table-header-gray text-start fw-medium text-wrap custom-bg-gray"><?= Yii::t('tariffs', 'City Delivery') ?></td>
                        <td>42 000</td>
                        <td>46 000</td>
                        <td>46 000</td>
                        <td>46 000</td>
                        <td>90 000</td>
                        <td>136 000</td>
                        <td>170 000</td>
                        <td>270 000</td>
                        <td>450 000</td>
                        <td>+1 400<br><small><?= Yii::t('tariffs', 'sum_per_kg') ?></small></td>
                    </tr>
                    <tr>
                        <td class="table-header-gray text-start fw-medium text-wrap custom-bg-gray"><?= Yii::t('tariffs', 'Intercity Courier') ?></td>
                        <td>35 000</td>
                        <td>35 000</td>
                        <td>46 000</td>
                        <td>75 000</td>
                        <td>90 000</td>
                        <td>136 000</td>
                        <td>170 000</td>
                        <td>270 000</td>
                        <td>450 000</td>
                        <td>+900<br><small><?= Yii::t('tariffs', 'sum_per_kg') ?></small></td>
                    </tr>
                    <tr>
                        <td class="table-header-gray text-start fw-medium text-wrap custom-bg-gray"><?= Yii::t('tariffs', 'Intercity Border') ?></td>
                        <td>70 000</td>
                        <td>70 000</td>
                        <td>92 000</td>
                        <td>100 000</td>
                        <td>180 000</td>
                        <td>272 000</td>
                        <td>340 000</td>
                        <td>540 000</td>
                        <td>900 000</td>
                        <td>+1 800<br><small><?= Yii::t('tariffs', 'sum_per_kg') ?></small></td>
                    </tr>
                    <tr>
                        <td class="table-header-gray text-start fw-medium text-wrap custom-bg-gray"><?= Yii::t('tariffs', 'Border Delivery') ?></td>
                        <td>56 000</td>
                        <td>59 000</td>
                        <td>69 000</td>
                        <td>75 000</td>
                        <td>135 000</td>
                        <td>204 000</td>
                        <td>255 000</td>
                        <td>405 000</td>
                        <td>675 000</td>
                        <td>+1 600<br><small><?= Yii::t('tariffs', 'sum_per_kg') ?></small></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5 px-4">
                <div class="d-flex flex-column align-items-start mb-3">
                    <i class="bi bi-rocket-takeoff-fill rocket-icon"></i>
                    <h4 class="custom-blue mb-0"><?= Yii::t('tariffs', 'Delivery Terms') ?>:</h4>
                </div>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="text-secondary">•</span> <?= Yii::t('tariffs', 'Andijan, Fergana, Kokand, Karshi, Gulistan, Namangan, Jizzakh, Navoi, Samarkand, Bukhara:') ?> <span class="highlight-days">1-2 <?= Yii::t('tariffs', 'days') ?></span>
                    </li>
                    <li>
                        <span class="text-secondary">•</span> <?= Yii::t('tariffs', 'Termez, Urgench, Nukus:') ?> <span class="highlight-days">3-4 <?= Yii::t('tariffs', 'days') ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card my-5">
        <div class="main-card p-4 ">
            <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                <h3 class="mb-0 fw-normal"><?= Yii::t('tariffs', 'Package Prices') ?> (01.01.2025)</h3>
                <span class="badge badge-orange px-3 py-2 rounded-pill"><?= Yii::t('tariffs', 'Prices excluding vat') ?></span>
                <span class="badge badge-green px-3 py-2 rounded-pill"><?= Yii::t('tariffs', 'Sum') ?></span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-header-gray">
                        <tr class="">
                            <th class="col-6 py-4 custom-gray-700 fw-semibold text-start border-end"><?= Yii::t('tariffs', 'Size') ?></th>
                            <th class="col-6 py-4 custom-gray-700 fw-semibold border-start"><?= Yii::t('tariffs', 'Price') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="table-header-gray py-4 text-start fw-medium custom-bg-gray border-end">S (15*25)</td>
                        <td class="border-start py-4">1 000</td>
                    </tr>
                    <tr>
                        <td class="table-header-gray py-4 text-start fw-medium text-wrap custom-bg-gray border-end">M (25*40)</td>
                        <td class="border-start py-4">1 000</td>
                    </tr>
                    <tr>
                        <td class="table-header-gray py-4 text-start fw-medium text-wrap custom-bg-gray border-end">L (35*40)</td>
                        <td class="border-start py-4">1 500</td>
                    </tr>
                    <tr>
                        <td class="table-header-gray py-4 text-start fw-medium text-wrap custom-bg-gray border-end">XL (50*40)</td>
                        <td class="border-start py-4">2 000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-5 px-4">
                <div class="d-flex flex-column align-items-start mb-3">
                    <i class="bi bi-rocket-takeoff-fill rocket-icon"></i>
                    <h4 class="custom-blue mb-0"><?= Yii::t('tariffs', 'Delivery Terms') ?></h4>
                </div>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="text-secondary">•</span> <?= Yii::t('tariffs', 'Andijan, Fergana, Kokand, Karshi, Gulistan, Namangan, Jizzakh, Navoi, Samarkand, Bukhara:') ?> <span class="highlight-days">1-2 <?= Yii::t('tariffs', 'days') ?></span>
                    </li>
                    <li>
                        <span class="text-secondary">•</span> <?= Yii::t('tariffs', 'Termez, Urgench, Nukus:') ?> <span class="highlight-days">3-4 <?= Yii::t('tariffs', 'days') ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="d-none d-md-block">
        <?= $this->render('/site/sections/_contact') ?>
    </div>


</div>
