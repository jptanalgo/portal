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

// Handle Previous button
document.getElementById('previous-button').addEventListener('click', function() {
    // Logic to go back to the previous step
    alert("Going back to the previous step...");
});

// Handle Next button
document.getElementById('next-button').addEventListener('click', function() {
    // Logic for the next step
    alert("Proceeding to the next step...");
});
