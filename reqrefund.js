document.getElementById('request-refund-button').addEventListener('click', function() {
    const studentName = document.getElementById('student-name').value;
    const accountNo = document.getElementById('account-no').value;
    const refundReason = document.getElementById('refund-reason').value;
    const responseMessage = document.getElementById('response-message');

    if (!studentName || !accountNo || !refundReason) {
        responseMessage.textContent = 'Please fill out all fields.';
        return;
    }

    responseMessage.textContent = 'Processing your refund request...';

    // Simulate an API call with a timeout
    setTimeout(() => {
        responseMessage.textContent = 'Your refund request has been submitted successfully! The amount will be credited back to your account shortly.';
    }, 2000); // Simulates a 2-second delay
});
