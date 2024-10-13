<?php
// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Access the data
$pin = $data['pin'];
$mobile = $data['mobile'];
$email = $data['email'];
$username = $data['username'];

// Process the data (e.g., save to database, etc.)
// Make sure to validate and sanitize your input

// Return a response
echo json_encode(['success' => true]);
?>
