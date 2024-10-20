<?php 
include("connections.php"); // Include your database connection file
$email = $password = "";
$emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required!";
    } else {
        $password = $_POST["password"];
    }

    // Only proceed if there are no validation errors
    if (empty($emailErr) && empty($passwordErr)) {
        // Prepare the SQL statement to check if email exists in the login1 table
        $stmt = $conn->prepare("SELECT * FROM login1 WHERE email = ?"); // Ensure login1 table exists
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $db_password = $row["password"];
            $account_type = $row["account_type"]; // Check the account type (admin or student)

            // Check if the password matches
            if ($password === $db_password) { // Use strict comparison
                // Check the user's role
                if ($account_type == "1") {
                    // Redirect admin to the admin dashboard
                    echo "<script>window.location.href = '../html/homeprofile.html';</script>";
                } else if ($account_type == "2") {
                    // Redirect student to the student home page
                    echo "<script>window.location.href = '../html/grades.html';</script>";
                } else {
                    echo "Unknown account type!";
                }
            } else {
                $passwordErr = "Password is incorrect!";
            }
        } else {
            $emailErr = "Email is not registered!";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <title>STUDENT PORTAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/splogin.css?v=<?php echo time(); ?>">
</head>
<body>
    <center>
        <div class="container1">
            <img class="logo" src="../bcplogo.jpg" alt="Logo">
            <h3>Login Form</h3>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input class="box" type="text" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <br><span class="error"><?php echo $emailErr; ?></span><br>
                
                <input class="box" type="password" placeholder="Password" name="password">
                <br><span class="error"><?php echo $passwordErr; ?></span><br>
                
                <button class="loginbtn" type="submit" name="submit">Login</button>
            </form>
            
            <label>
                <center>
                    <input class="check" type="checkbox" name="remember">
                    <label for="remember" class="p1">Remember Me</label>
                </center>
            </label>
        </div>


          
           
        </div>
    </center>
</body>
</html>