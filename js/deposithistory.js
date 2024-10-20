const depositHistory = [
    {
        date: '2024-12-01',
        studentNo: '123456',
        mop: 'AUB',
        amount: 5000.00,
        status: 'Completed'
    },
    {
        date: '2024-12-02',
        studentNo: '654321',
        mop: 'AUB',
        amount: 5000.00,
        status: 'Pending'
    },
    {
        date: '2024-12-03',
        studentNo: '789012',
        mop: 'AUB',
        amount: 5000.00,
        status: 'Rejected'
    }
];

// Function to render the deposit history
function renderHistory() {
    const historyBody = document.getElementById('history-body');
    depositHistory.forEach(transaction => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${transaction.date}</td>
            <td>${transaction.studentNo}</td>
            <td>${transaction.mop}</td>
            <td>${transaction.amount.toFixed(2)}</td>
            <td class="${getStatusClass(transaction.status)}">${transaction.status}</td>
        `;
        historyBody.appendChild(row);
    });
}

// Function to determine status class based on status
function getStatusClass(status) {
    switch (status) {
        case 'Pending':
            return 'status-pending';
        case 'Completed':
            return 'status-completed';
        case 'Rejected':
            return 'status-rejected';
        default:
            return '';
    }
}

// Initialize the history rendering
renderHistory();

// Handle Previous button
document.getElementById('previous-button').addEventListener('click', function() {
    alert("Going back to the previous step...");
});

// Handle Next button
document.getElementById('next-button').addEventListener('click', function() {
    alert("Proceeding to the next step...");
});
