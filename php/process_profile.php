<?php
// Sample data from the database
$student = [
    'name' => 'John Doe',
    'age' => 20,
    'student_number' => '123456',
    'email' => 'johndoe@example.com',
    'mobile' => '+1234567890',
    'address' => '123 Main St, City, Country'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Profile</h1>
        <form action="process_profile.php" method="POST">
            <div class="form-group">
                <label>Name:</label>
                <div id="name"><?php echo htmlspecialchars($student['name']); ?></div>
            </div>

            <div class="form-group">
                <label>Age:</label>
                <div id="age"><?php echo htmlspecialchars($student['age']); ?></div>
            </div>

            <div class="form-group">
                <label>Student Number:</label>
                <div id="student_number"><?php echo htmlspecialchars($student['student_number']); ?></div>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <div id="email"><?php echo htmlspecialchars($student['email']); ?></div>
            </div>

            <div class="form-group">
                <label>Mobile Number:</label>
                <div id="mobile"><?php echo htmlspecialchars($student['mobile']); ?></div>
            </div>

            <div class="form-group">
                <label>Address:</label>
                <div id="address"><?php echo htmlspecialchars($student['address']); ?></div>
            </div>

            <button type="button" onclick="window.location.href='edit_profile.php'">Edit Profile</button>
        </form>
    </div>
</body>
</html>
