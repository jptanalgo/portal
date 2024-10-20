document.getElementById('concern-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const message = document.getElementById('message').value;
    const email = document.getElementById('email').value;
    const date = document.getElementById('date').value;
    const responseMessage = document.getElementById('response-message');

    // Simulate processing the form
    responseMessage.textContent = 'Submitting your concern...';

    // Simulate a delay for processing (e.g., sending data to server)
    setTimeout(() => {
        responseMessage.textContent = 'Your concern has been submitted successfully!';
        // Reset the form
        document.getElementById('concern-form').reset();
    }, 2000); // Simulates a 2-second delay
});
