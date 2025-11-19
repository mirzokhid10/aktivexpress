<?php

/** @var yii\web\View $this */

$this->title = 'Aktiv Express';
?>
<div class="site-index">
    <div class="padding-top">
        <?= $this->render('sections/_hero') ?>
    </div>
    <?= $this->render('sections/_calculation') ?>
    <?= $this->render('sections/_features') ?>
    <?= $this->render('sections/_services') ?>

    <?= $this->render('sections/_order_methods') ?>
    <?= $this->render('sections/_partners') ?>
    <?= $this->render('sections/_contact') ?>
</div>
