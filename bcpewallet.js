let balance = 0.00;
const limit = 50000;
const depositHistory = [];
const billHistory = [];
const refundHistory = [];

document.getElementById('deposit-button').addEventListener('click', function() {
    const amount = parseFloat(prompt("Enter deposit amount:"));
    if (amount <= 0) return alert("Deposit amount must be positive.");
    if (balance + amount > limit) return alert("Deposit exceeds limit.");

    balance += amount;
    depositHistory.push(amount);
    updateUI();
});

document.getElementById('pay-bill-button').addEventListener('click', function() {
    const amount = parseFloat(prompt("Enter bill amount:"));
    if (amount <= 0) return alert("Bill amount must be positive.");
    if (amount > balance) return alert("Insufficient balance.");

    balance -= amount;
    billHistory.push(amount);
    updateUI();
});

document.getElementById('refund-button').addEventListener('click', function() {
    const amount = parseFloat(prompt("Enter refund amount:"));
    if (amount <= 0) return alert("Refund amount must be positive.");

    balance += amount;
    refundHistory.push(amount);
    updateUI();
});

document.getElementById('view-deposit-history').addEventListener('click', function() {
    displayHistory(depositHistory, 'Deposit History');
});

document.getElementById('view-bill-history').addEventListener('click', function() {
    displayHistory(billHistory, 'Bill Payment History');
});

document.getElementById('view-refund-history').addEventListener('click', function() {
    displayHistory(refundHistory, 'Refund History');
});

function updateUI() {
    document.getElementById('balance').textContent = balance.toFixed(2);
    document.getElementById('history-output').innerHTML = ''; // Clear history display
}

function displayHistory(historyArray, title) {
    let output = `<h3>${title}</h3><ul>`;
    historyArray.forEach(item => {
        output += `<li>$${item.toFixed(2)}</li>`;
    });
    output += '</ul>';
    document.getElementById('history-output').innerHTML = output || 'No records found.';
}
