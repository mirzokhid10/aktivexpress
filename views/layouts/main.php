<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\ActiveForm;


use app\models\Users;

$model = new Users();

/** @var app\models\LoginForm $model */

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <!--  Bootstrap Icon CSS Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!--  Font Awesome Icon CSS Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  Google Fonts CSS Link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!--  Bootstrap 5.3.8 CSS Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="icon" href="<?= Yii::getAlias('@web/assets/logos/icon.png') ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <?php $this->head() ?>

</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<!-- Global Header -->
<?= $this->render('_header') ?>
<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= $content ?>
    </div>
</main>


<!-- Global Footer -->
<?= $this->render('_footer') ?>

<!-- Modal Structure For Login Goes Here -->
<div class="modal fade" id="loginModal" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-modal-content">

            <div class="modal-body">
                <div class="login-container mx-auto">
                    <h1 class="login-title"><?= Yii::t('app', 'Login') ?></h1>
                    <p class="login-subtitle"><?= Yii::t('app', 'Welcome back! Please enter your details.') ?></p>

                    <?php $form = ActiveForm::begin(['id'=>'login-form']); ?>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><?= Yii::t('app', 'Phone number') ?></label>
                        <?= $form->field($model, 'phone')->textInput(['placeholder'=>"+998", 'autofocus'=>true])->label(false) ?>
                    </div>

                    <?= Html::submitButton(
                        $model->isNewRecord ? Yii::t('app', 'Login Button') : Yii::t('app', 'Update Button'),
                        ['class' => 'btn btn-login w-100 text-white']
                    ) ?>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Structure For Login Ends Here -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<?php
$flash = Yii::$app->session->getFlash('success');
if ($flash) {
    $this->registerJs("toastr.success('$flash');");
}
?>
<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>


