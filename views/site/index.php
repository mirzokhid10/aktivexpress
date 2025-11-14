<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
<!--    --><?php //= $this->render('_hero') ?>
<!--    --><?php //= $this->render('_features') ?>
<!--    --><?php //= $this->render('_services') ?>
<!--    --><?php //= $this->render('_order_methods') ?>
<!--    --><?php //= $this->render('_partners') ?>
<!--    --><?php //= $this->render('_contact') ?>

    <body>

    <main class="container px-0">
        <div class="padding-top">
            <?= $this->render('_hero') ?>
        </div>
        <?= $this->render('_calculation') ?>
        <?= $this->render('_features') ?>
        <?= $this->render('_services') ?>

        <?= $this->render('_order_methods') ?>
        <?= $this->render('_partners') ?>
        <?= $this->render('_contact') ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>

</div>
