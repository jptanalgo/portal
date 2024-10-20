let currentStep = 0;
const steps = document.querySelectorAll('.form-step');
const nextButtons = document.querySelectorAll('.next-button');
const otpTimer = document.getElementById('otp-timer');
const getNewOtpButton = document.getElementById('get-new-otp');

// Show the first step
steps[currentStep].classList.add('active');

// Handle next button click
nextButtons.forEach(button => {
    button.addEventListener('click', () => {
        steps[currentStep].classList.remove('active');
        currentStep++;
        steps[currentStep].classList.add('active');

        if (currentStep === 1) {
            startOtpTimer();
        }
    });
});

// OTP timer logic
let timerInterval;
function startOtpTimer() {
    let timeLeft = 30;
    otpTimer.textContent = timeLeft;
    getNewOtpButton.disabled = true;

    timerInterval = setInterval(() => {
        timeLeft--;
        otpTimer.textContent = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            getNewOtpButton.disabled = false;
        }
    }, 1000);
}

// Handle keypad inputs for PIN
const pinInput = document.getElementById('pin');
const keypadButtons = document.querySelectorAll('.keypad button:not(.clear)');

keypadButtons.forEach(button => {
    button.addEventListener('click', () => {
        pinInput.value += button.textContent;
    });
});

// Clear button functionality
document.querySelector('.clear').addEventListener('click', () => {
    pinInput.value = '';
});

// Handle new OTP button click
getNewOtpButton.addEventListener('click', () => {
    startOtpTimer();
});
