<?php 
// Include the database connection file
include 'connections.php'; 

$Username = $Password = $ConfirmPassword = $Email = $Age = "";
$UsernameErr = $PasswordErr = $ConfirmPasswordErr = $EmailErr = $AgeErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Username"])) {
        $UsernameErr = "Username is required!";
    } else {
        $Username = $_POST["Username"];
    }

    if (empty($_POST["Password"])) {
        $PasswordErr = "Password is required!";
    } else {
        $Password = $_POST["Password"];
    }

    if (empty($_POST["Cpassword"])) {
        $ConfirmPasswordErr = "Confirm Password is required!";
    } else {
        $ConfirmPassword = $_POST["Cpassword"];
    }

    if (empty($_POST["Email"])) {
        $EmailErr = "Email is required!";
    } else {
        $Email = $_POST["Email"];
    }

    if (empty($_POST["Age"])) {
        $AgeErr = "Age is required!";
    } else {
        $Age = $_POST["Age"];
    }

    // Check for errors before inserting into the database
    if (empty($UsernameErr) && empty($PasswordErr) && empty($ConfirmPasswordErr) && empty($EmailErr) && empty($AgeErr)) {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO login1 (username, password, cpassword, age, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $Username, $Password, $ConfirmPassword, $Age, $Email);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!');</script>";
            // Redirect or take other actions
        } else {
            echo "<script>alert('Error: Could not register.');</script>";
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
    <link rel="stylesheet" href="create.css">
</head>
<body>   
<center>
    <br>
    <h1>REGISTRATION</h1> <br><br>
</center>
    
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
 
    <center>
        <label>Username: </label> 
        <input type="text" placeholder="Enter Username:" name="Username"> 
        <br> <span class="error"><?php echo $UsernameErr; ?></span>
    </center>

    <center>
        <label>Password: </label> 
        <input type="password" placeholder="Enter Password:" name="Password"> 
        <br> <span class="error"><?php echo $PasswordErr; ?></span>
    </center>

    <center>
        <label>Cpassword: </label> 
        <input type="password" placeholder="Enter Confirm Password:" name="Cpassword"> 
        <br> <span class="error"><?php echo $ConfirmPasswordErr; ?></span>
    </center>

    <center>
        <label>Email: </label> 
        <input type="text" placeholder="Enter Email:" name="Email">
        <br> <span class="error"><?php echo $EmailErr; ?></span>
    </center>

    <center>
        <label>Age: </label> 
        <input type="text" placeholder="Enter Age:" name="Age"> 
        <br> <span class="error"><?php echo $AgeErr; ?></span>
    </center>

    
    <br>

    <center>
        <button type="submit">Create Account</button>
    </center>
</form>
</body>     
</html>