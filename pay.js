document.getElementById('pay-button').addEventListener('click', function() {
    const studentName = document.getElementById('student-name').value;
    const studentNo = document.getElementById('student-no').value;
    const amount = parseFloat(document.getElementById('amount').value);

    if (studentName && studentNo && amount > 0) {
        alert(`Payment of ${amount.toFixed(2)} made for ${studentName} (Student No: ${studentNo}).`);
        // Here, you could add logic to process the payment.
    } else {
        alert("Please fill out all fields correctly.");
    }
});
