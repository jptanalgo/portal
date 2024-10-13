document.getElementById('deposit-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const amount = parseFloat(document.getElementById('deposit-amount').value);
    const paymentMode = document.getElementById('payment-mode').value;

    if (amount <= 0) {
        alert("Please enter a valid deposit amount.");
        return;
    }

    if (!paymentMode) {
        alert("Please select a mode of payment.");
        return;
    }

    // Proceed with the deposit logic (mock)
    alert(`Depositing ${amount.toFixed(2)} using ${paymentMode}.`);

    // Clear the fields after submission
    document.getElementById('deposit-amount').value = '';
    document.getElementById('payment-mode').value = '';
});

// Handle Previous button
document.getElementById('previous-button').addEventListener('click', function() {
    // Logic for previous step (if applicable)
    alert("Going to the previous step...");
});

function copyToClipboard(elementId) {
    const text = document.getElementById(elementId).textContent;
    navigator.clipboard.writeText(text)
        .then(() => {
            alert(`${text} copied to clipboard!`);
        })
        .catch(err => {
            console.error('Error copying text: ', err);
        });
}

// Handle Previous button (disabled, no functionality)
document.getElementById('previous-button').addEventListener('click', function() {
    alert("This button is disabled.");
});

// Handle Next button
document.getElementById('next-button').addEventListener('click', function() {
    // Logic for the next step
    alert("Proceeding to the next step...");
});
