document.getElementById('upload-button').addEventListener('click', function() {
    const fileInput = document.getElementById('file-input');
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('preview');
            img.src = e.target.result; // Set the image source to the uploaded file
            img.style.display = 'block'; // Show the image
            document.getElementById('download-button').style.display = 'inline'; // Show download button
        };
        reader.readAsDataURL(file); // Read the file as a Data URL
    } else {
        alert("Please upload an image.");
    }
});

document.getElementById('download-button').addEventListener('click', function() {
    const img = document.getElementById('preview');

    if (img.src) {
        const link = document.createElement('a');
        link.href = img.src; // Use the uploaded image as the download link
        link.download = 'receipt.png'; // Name of the downloaded file
        link.click(); // Trigger the download
    }
});

// Handle Previous button
document.getElementById('previous-button').addEventListener('click', function() {
    alert("Going back to the previous step...");
});

// Handle Next button
document.getElementById('next-button').addEventListener('click', function() {
    alert("Proceeding to the next step...");
});

