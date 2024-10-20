let currentStep = 0;
const steps = document.querySelectorAll('.form-step');
const pinInput = document.getElementById('pin');
const confirmPinInput = document.getElementById('confirmPin');

function nextStep() {
    if (currentStep < steps.length - 1) {
        steps[currentStep].classList.remove('active');
        currentStep++;
        steps[currentStep].classList.add('active');
    }
}

function enterPin(number) {
    if (pinInput.value.length < 4) {
        pinInput.value += number;
    }
}

function enterConfirmPin(number) {
    if (confirmPinInput.value.length < 4) {
        confirmPinInput.value += number;
    }
}

function clearPin() {
    pinInput.value = '';
}

function clearConfirmPin() {
    confirmPinInput.value = '';
}

function submitForm() {
    // Implement form submission logic here
    alert('Form submitted!');
}
