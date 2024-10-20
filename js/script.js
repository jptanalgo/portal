let timerInterval;

let timeLeft = 30;

function sendOTP() {

document.getElementById('mobile-section').style.display = 'none';

document.getElementById('otp-section').style.display = 'block';

startTimer();

}

function startTimer() {

document.getElementById('timer').innerText = timeLeft;

timerInterval = setInterval(() => {

timeLeft--;

document.getElementById('timer').innerText = timeLeft;

if (timeLeft <= 0) {

clearInterval(timerInterval);

document.getElementById('otp-timer').innerText = "You can request a new OTP.";

}

}, 1000);

}

function verifyOTP() {

// Add OTP verification logic here

document.getElementById('otp-section').style.display = 'none';

document.getElementById('details-section').style.display = 'block';

}