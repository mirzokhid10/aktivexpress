const loginModal = document.getElementById("loginModal");

loginModal.addEventListener("shown.bs.modal", function () {

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

    const phoneRegex = /^998[0-9]{9}$/;

    function showAlert(message, type='danger') {
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
        submitBtn.textContent = smsSendCode;
        subtitle.textContent = welComeTitle;
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

            if (currentStep === 'phone') {
                const phone = phoneInput.value.trim();

                if (!phoneRegex.test(phone)) {
                    showAlert(invalidPhone);
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                    return;
                }

                try {
                    const formData = new URLSearchParams();
                    formData.append('phone', phone);

                    const response = await fetch(loginPhoneUrl, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-Token': csrfToken
                        },
                        body: formData.toString()
                    });

                    const data = await response.json();
                    if (data.success) {
                        showAlert(data.message, 'success');
                        switchToCodeStep(phone);
                    } else {
                        showAlert(data.message, 'danger');
                    }
                } catch (err) {
                    showAlert(connectionError, 'danger');
                }

                submitBtn.disabled = false;
                submitBtn.textContent = smsSendCode;

            } else if (currentStep === 'code') {
                const code = codeInput.value.trim();

                if (code.length !== 5 || !/^\d+$/.test(code)) {
                    showAlert(invalidCode, 'danger');
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                    return;
                }

                try {
                    const formData = new URLSearchParams();
                    formData.append('phone', userPhone);
                    formData.append('code', code);

                    const response = await fetch(loginCodeUrl, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-Token': csrfToken
                        },
                        body: formData.toString()
                    });

                    const data = await response.json();
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
                    showAlert(connectionError, 'danger');
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
