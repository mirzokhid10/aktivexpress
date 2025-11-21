<?php
use \yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
?>

<div class="hero-main row d-flex align-items-center justify-content-between gap-5 gap-md-0">
    <div class="col-12 col-md-5 p-0 text-center text-md-start order-1 order-md-1">
        <div class="birun-head-text">
            <h1><?= Yii::t('hero', 'Your reliable partner') ?></h1>
            <p><?= Yii::t('hero', 'We are your trusted assistant in all postal and logistics matters') ?></p>

            <?php $form = ActiveForm::begin([
                'action' => ['/my-orders/search'],
                'method' => 'get',
                'options' => ['class' => 'birun-search-barcode d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-md-start gap-3']
            ]); ?>
                <div class="flex-grow-1 w-100" style="max-width: 400px;">
                    <?= Html::textInput('tracking_number', null, [
                        'class' => 'form-control w-100 mb-sm-0 mb-md-0',
                        'placeholder' => Yii::t('hero', 'Enter your tracking number'). ": #019702241279431",

                    ]) ?>
                </div>
                <div class="flex-shrink-0">
                    <?= Html::submitButton(Yii::t('hero', 'Search'), ['class' => 'btn btn-search-barcode w-100']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="col-12 col-md-7 text-center text-md-start order-2 order-md-2">
        <div class="birun-head-img">
            <?= Html::img('@web/assets/logos/head-img.png', ['class'=>'w-100', 'alt' => 'logo']) ?>
        </div>
    </div>
</div>