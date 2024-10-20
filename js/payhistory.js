// Example payment history data
const paymentHistory = [
    {
        date: '2024-12-01',
        amount: 5000.00,
    },
];

// Function to render the payment history
function renderHistory() {
    const historyBody = document.getElementById('history-body');
    paymentHistory.forEach(transaction => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${transaction.date}</td>
            <td>${transaction.amount.toFixed(2)}</td>
        `;
        historyBody.appendChild(row);
    });
}

// Check payment response button
document.getElementById('check-response-button').addEventListener('click', function() {
    const responseMessage = document.getElementById('response-message');
    responseMessage.textContent = 'Waiting to check...';

    // Simulate an API call with a timeout
    setTimeout(() => {
        responseMessage.textContent = 'Response received! Your balance has been updated.';
    }, 2000); // Simulates a 2-second delay
});

// Initialize the history rendering
renderHistory();
