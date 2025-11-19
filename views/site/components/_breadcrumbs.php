<?php


use yii\widgets\Breadcrumbs;

/** @var array $links */

if (!empty($links)) {
    echo Breadcrumbs::widget([
        'links' => $links,
        'options' => ['class' => 'breadcrumb'],
        'itemTemplate' => "<li>{link}</li>\n",
        'activeItemTemplate' => "<li class='active'>{link}</li>\n",
    ]);
}
?>

