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


use app\models\User;

$model = new User();

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
    <meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Browser Tab Icon And Title Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= Yii::getAlias('@web/assets/logos/icons/favicon.ico')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::getAlias('@web/assets/logos/icons/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::getAlias('@web/assets/logos/icons/favicon-16x16.png')?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Yii::getAlias('@web/assets/logos/icons/apple-touch-icon.png')?>">

    <!--  Data Table CSS Link  -->
    <!-- DataTables (Bootstrap5 integration) CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />



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
                <div id="login-container" class="mx-auto">
                    <!-- Subtitle -->
                    <p class="login-subtitle" id="login-subtitle">
                        <?= Yii::t('app', 'Welcome back! Please enter your details.') ?>
                    </p>

                    <!-- Alert Messages -->
                    <div id="login-alert" class="alert d-none"></div>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'enableClientValidation' => false,
                        'enableAjaxValidation' => false,
                        'options' => [
                            'onsubmit' => 'return false;'
                        ],
                        'action' => ['site/login-phone'],
                    ]); ?>

                    <!-- Phone input -->
                    <div class="mb-3" id="phone-container">
                        <label for="phone" class="form-label"><?= Yii::t('app', 'Phone number') ?></label>
                        <?= $form->field($model, 'phone')->textInput([
                            'placeholder' => "998909984031",
                            'autofocus' => true,
                            'id' => 'phone-input'
                        ])->label(false) ?>
                        <small class="form-text text-muted" id="phone-hint">
                            <?= Yii::t('app', 'Format: 998XXXXXXXXX') ?>
                        </small>
                    </div>

                    <!-- SMS code input (hidden initially) -->
                    <div class="mb-3 d-none" id="code-input-container">
                        <label for="code" class="form-label"><?= Yii::t('app', 'SMS Code') ?></label>

                        <input type="text" id="code-input" name="code" class="form-control" maxlength="6" placeholder="
                        <?= Yii::t('app', 'Enter SMS code') ?>">
                    </div>

                    <?= Html::submitButton(Yii::t('app', 'Send SMS Code'), [
                        'class' => 'btn btn-login w-100 text-white',
                        'id' => 'submit-btn'
                    ]) ?>

                    <div class="text-center mt-3 d-none" id="change-phone-link">
                        <a href="#" id="reset-phone"><?= Yii::t('app', 'Change phone number') ?></a>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Jquery JS Link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const loginModal = document.getElementById("loginModal");

    loginModal.addEventListener("shown.bs.modal", function () {
        console.log("Login modal opened");

        const form = document.getElementById('login-form');
        const phoneInput = document.getElementById('phone-input');
        const codeInput = document.getElementById('code-input');
        const codeContainer = document.getElementById('code-input-container');
        const submitBtn = document.getElementById('submit-btn');
        const subtitle = document.getElementById('login-subtitle');
        const phoneHint = document.getElementById('phone-hint');
        const changePhoneLink = document.getElementById('change-phone-link');
        const resetPhoneBtn = document.getElementById('reset-phone');
        const alertBox = document.getElementById('login-alert');

        let currentStep = 'phone';
        let userPhone = '';

        // Updated regex to match format 998XXXXXXXXX
        const phoneRegex = /^998[0-9]{9}$/;

        function showAlert(message, type='danger') {
            alertBox.className = `alert alert-${type}`;
            alertBox.textContent = message;
            alertBox.classList.remove('d-none');
            setTimeout(() => alertBox.classList.add('d-none'), 5000);
        }

        function switchToCodeStep(phone) {
            console.log("Switching to CODE STEP");
            currentStep = 'code';
            userPhone = phone;

            phoneInput.setAttribute('readonly', true);
            phoneHint.classList.add('d-none');

            codeContainer.classList.remove('d-none');
            codeInput.focus();

            submitBtn.textContent = 'Verify & Login';
            subtitle.innerHTML = `We sent a code to <strong>${phone}</strong>`;
            changePhoneLink.classList.remove('d-none');
        }

        function resetToPhoneStep() {
            currentStep = 'phone';
            userPhone = '';

            phoneInput.removeAttribute('readonly');
            phoneInput.value = '';
            phoneHint.classList.remove('d-none');

            codeContainer.classList.add('d-none');
            codeInput.value = '';

            submitBtn.textContent = 'Send SMS Code';
            subtitle.textContent = 'Welcome back! Please enter your details.';
            changePhoneLink.classList.add('d-none');
            alertBox.classList.add('d-none');

            phoneInput.focus();
        }

        if (!form._listenerAttached) {
            form._listenerAttached = true;

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                submitBtn.disabled = true;
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Loading...';

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                if (currentStep === 'phone') {
                    const phone = phoneInput.value.trim();

                    if (!phoneRegex.test(phone)) {
                        showAlert('Invalid phone format. Use: 998XXXXXXXXX');
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                        return;
                    }

                    try {
                        const formData = new URLSearchParams();
                        formData.append('phone', phone);

                        const response = await fetch('<?= \yii\helpers\Url::to(['site/login-phone']) ?>', {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-Token': csrfToken
                            },
                            body: formData.toString()
                        });

                        const data = await response.json();
                        console.log("Phone response:", data);

                        if (data.success) {
                            showAlert(data.message, 'success');
                            switchToCodeStep(phone);
                        } else {
                            showAlert(data.message, 'danger');
                        }
                    } catch (err) {
                        console.error("Phone request error:", err);
                        showAlert('Connection error. Try again.', 'danger');
                    }

                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Send SMS Code';

                } else if (currentStep === 'code') {
                    const code = codeInput.value.trim();

                    // API sends 5 digit codes
                    if (code.length !== 5 || !/^\d+$/.test(code)) {
                        showAlert('Please enter the 5-digit SMS code', 'danger');
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                        return;
                    }

                    try {
                        const formData = new URLSearchParams();
                        formData.append('phone', userPhone);
                        formData.append('code', code);

                        const response = await fetch('<?= \yii\helpers\Url::to(['site/login-code']) ?>', {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-Token': csrfToken
                            },
                            body: formData.toString()
                        });

                        const data = await response.json();
                        console.log("Code response:", data);

                        if (data.success) {
                            showAlert(data.message, 'success');
                            setTimeout(() => {
                                window.location.href = data.redirect;
                            }, 800);
                        } else {
                            showAlert(data.message, 'danger');
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                    } catch (err) {
                        console.error("Code request error:", err);
                        showAlert('Connection error. Try again.', 'danger');
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                    }
                }
            });

            resetPhoneBtn.addEventListener('click', function(e) {
                e.preventDefault();
                resetToPhoneStep();
            });
        }
    });
</script>

<?php $this->endBody() ?>


<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.datatable').DataTable({
            info: false,
        });
    });
</script>
</body>
</html>

<?php $this->endPage() ?>


