// Example refund history data
const refundHistory = [
    {
        accountName: 'Jonalyn Diala',
        accountNumber: '12345678',
        amount: 3000.00,
        reason: 'Graduate'
    },
    
];

// Function to render the refund history
function renderHistory() {
    const historyBody = document.getElementById('history-body');
    refundHistory.forEach(refund => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${refund.accountName}</td>
            <td>${refund.accountNumber}</td>
            <td>${refund.amount.toFixed(2)}</td>
            <td>${refund.reason}</td>
        `;
        historyBody.appendChild(row);
    });
}

// Initialize the history rendering
renderHistory();
