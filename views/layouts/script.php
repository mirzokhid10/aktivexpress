<script>
document.addEventListener('DOMContentLoaded', function() {
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

    const phoneRegex = /^9989[012345789][0-9]{7}$/;

    function showAlert(message, type = 'danger') {
        alertBox.className = `alert alert-${type}`;
        alertBox.textContent = message;
        alertBox.classList.remove('d-none');
        setTimeout(() => alertBox.classList.add('d-none'), 5000);
    }

    function switchToCodeStep(phone) {
        currentStep = 'code';
        userPhone = phone;

        phoneInput.setAttribute('readonly', true);
        phoneHint.classList.add('d-none');

        codeContainer.classList.remove('d-none');
        codeInput.focus();

        submitBtn.textContent = 'Verify & Login';
        subtitle.innerHTML = 'We sent a code to <strong>' + phone + '</strong>';
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

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.textContent = 'Loading...';

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (currentStep === 'phone') {
            const phone = phoneInput.value.trim();
            if (!phoneRegex.test(phone)) {
                showAlert('Invalid phone number format');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send SMS Code';
                return;
            }

            try {
                const response = await fetch(
                    "<?= \yii\helpers\Url::to(["site/login-phone"]) ?>", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-Token': csrfToken
                    },
                    body: 'phone=' + encodeURIComponent(phone)
                });

                const data = await response.json();
                console.log(data);
                console.log("DATA RECEIVED FROM login-phone:", data);
                console.log("currentStep BEFORE:", currentStep);
                if (data.success) {
                    console.log("Calling switchToCodeStep", phone);
                    showAlert(data.message, 'success');
                    switchToCodeStep(phone);
                    console.log("currentStep AFTER:", currentStep);
                } else {
                    showAlert(data.message, 'danger');
                }
            } catch (e) {
                console.error('Fetch error:', e);
                showAlert('Connection error. Try again.', 'danger');
            } finally {
                submitBtn.disabled = false;
            }

        } else if (currentStep === 'code') {
            const code = codeInput.value.trim();
            if (!code || code.length < 4) {
                showAlert('Please enter a valid SMS code', 'danger');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Verify & Login';
                return;
            }

            try {
                const response = await fetch('<?= \yii\helpers\Url::to(['
                site / login - code ']) ?>', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-Token': csrfToken
                    },
                    body: 'phone=' + encodeURIComponent(userPhone) + '&code=' + encodeURIComponent(code)
                });

                const data = await response.json();

                if (data.success) {
                    showAlert(data.message, 'success');
                    setTimeout(() => window.location.href = data.redirect, 1000);
                } else {
                    console.log(data.message)
                    showAlert(data.message, 'danger');
                }
            } catch (e) {
                console.error('Fetch error:', e);
                showAlert('Connection error. Try again.', 'danger');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Verify & Login';
            }
        }
    });

    resetPhoneBtn.addEventListener('click', function(e) {
        e.preventDefault();
        resetToPhoneStep();
    });
});

</script>