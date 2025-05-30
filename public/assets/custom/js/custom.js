// Lettering.js
document.addEventListener("DOMContentLoaded", function () {
    const otpInputs = document.querySelectorAll(".otp-input");

    if (otpInputs.length === 0) {
        return; // Exit if no inputs are found
    }

    // Focus the first input on a page load if available
    otpInputs[0].focus();

    otpInputs.forEach((input, index) => {
        input.addEventListener("input", (e) => {
            if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].disabled = false;
                otpInputs[index + 1].focus();
            }
        });

        input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && e.target.value === "" && index > 0) {
                otpInputs[index - 1].focus();
                otpInputs[index - 1].disabled = false;
            }
        });
    });
});

// Resend OTP
document.addEventListener('DOMContentLoaded', function () {
    const resendOtp = document.getElementById('resendOtp');
    const resendLink = document.getElementById('resendLink');
    const userIdField = document.getElementById('userId');

    if (!userIdField || (!resendOtp && !resendLink)) {
        return;
    }

    let url = '';
    if (resendOtp) {
        url = `/resend-reset-otp/${encodeURIComponent(userIdField.value)}`;
    } else if (resendLink) {
        url = `/resend-otp/${encodeURIComponent(userIdField.value)}`;
    }

    const element = resendOtp || resendLink; // Use the available element
    const originalText = element.innerHTML;

    function startCountdown(expiryTime) {
        const interval = setInterval(() => {
            const now = new Date().getTime();
            const expiry = new Date(expiryTime).getTime();
            const remainingTime = expiry - now;

            if (remainingTime > 0) {
                const minutes = Math.floor((remainingTime / 1000 / 60) % 60);
                const seconds = Math.floor((remainingTime / 1000) % 60);
                element.innerHTML = `Resend in ${minutes}m ${seconds}s`;
                element.style.pointerEvents = 'none';
                element.style.opacity = '0.6';
            } else {
                clearInterval(interval);
                element.innerHTML = originalText;
                element.style.pointerEvents = 'auto';
                element.style.opacity = '1';
                localStorage.removeItem('otpExpiry');
            }
        }, 1000);
    }

    const storedExpiry = localStorage.getItem('otpExpiry');
    if (storedExpiry) {
        startCountdown(storedExpiry);
    }

    element.addEventListener('click', function (event) {
        event.preventDefault();

        element.innerHTML = 'Resending...';
        element.style.pointerEvents = 'none';
        element.style.opacity = '0.6';

        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    iziToast.success({
                        message: data.message,
                        position: 'topRight'
                    });
                    localStorage.setItem('otpExpiry', data.otpExpiry);
                    startCountdown(data.otpExpiry);
                } else {
                    iziToast.error({
                        message: data.message,
                        position: 'topRight'
                    });
                    element.innerHTML = originalText;
                    element.style.pointerEvents = 'auto';
                    element.style.opacity = '1';
                }
            })
            .catch(error => {
                iziToast.error({
                    message: error,
                    position: 'topRight'
                });
                element.innerHTML = originalText;
                element.style.pointerEvents = 'auto';
                element.style.opacity = '1';
            });
    });
});
