<?php

/** @var string $title */

/** @var array $breadcrumbs */

use yii\bootstrap5\Breadcrumbs;

?>
<div class="my-sm-3 my-md-4 my-lg-5 py-5">
    <?= Breadcrumbs::widget([
        'links' => $breadcrumbs ?? [],
        'options' => ['class' => 'breadcrumb'],
    ]) ?>
    <h1><?= $title ?></h1>
</div>