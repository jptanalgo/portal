<?php
// Include the database connection file
include 'connections.php'; 

// Check if a delete request was made
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM login1 WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        // Redirect back to the create.php page with a success message
        header("Location: view.php?message=User deleted successfully!");
        exit; // Ensure no further code is executed
    } else {
        // Redirect back to the create.php page with an error message
        header("Location: view.php?message=Error deleting user.");
        exit; // Ensure no further code is executed
    }

    $stmt->close();
} else {
    // Redirect back to create.php if no delete ID was provided
    header("Location: view.php?message=No user specified to delete.");
    exit; // Ensure no further code is executed
}
?>