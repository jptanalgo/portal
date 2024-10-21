<?php
// Include the database connection file
include 'connections.php'; 

// Initialize variables for form data and errors
$Username = $Password = $ConfirmPassword = $Email = $Age = $AccountType = "";
$UsernameErr = $PasswordErr = $ConfirmPasswordErr = $EmailErr = $AgeErr = "";

// Check if an ID was passed to the update page
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the user data from the database
    $stmt = $conn->prepare("SELECT * FROM login1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $Username = $user['username'];
        $Email = $user['email'];
        $Age = $user['age'];
        $AccountType = $user['account_type'];
    } else {
        echo "<script>alert('User not found.'); window.location.href = 'create.php';</script>";
    }

    $stmt->close();
}

// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the form fields
    if (empty($_POST["Username"])) {
        $UsernameErr = "Username is required!";
    } else {
        $Username = $_POST["Username"];
    }

    if (empty($_POST["Email"])) {
        $EmailErr = "Email is required!";
    } elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
        $EmailErr = "Invalid email format!";
    } else {
        $Email = $_POST["Email"];
    }

    if (empty($_POST["Age"])) {
        $AgeErr = "Age is required!";
    } elseif (!filter_var($_POST["Age"], FILTER_VALIDATE_INT)) {
        $AgeErr = "Age must be a number!";
    } else {
        $Age = $_POST["Age"];
    }

    // Password validation (if provided)
    if (!empty($_POST["Password"]) || !empty($_POST["ConfirmPassword"])) {
        if (empty($_POST["Password"])) {
            $PasswordErr = "Password is required!";
        } else {
            $Password = $_POST["Password"];
        }

        if (empty($_POST["ConfirmPassword"])) {
            $ConfirmPasswordErr = "Confirm Password is required!";
        } else {
            $ConfirmPassword = $_POST["ConfirmPassword"];
            if ($Password !== $ConfirmPassword) {
                $ConfirmPasswordErr = "Passwords do not match!";
            }
        }
    }

    // Check if there are no validation errors
    if (empty($UsernameErr) && empty($EmailErr) && empty($AgeErr) && empty($PasswordErr) && empty($ConfirmPasswordErr)) {
        // If passwords are provided, update them; otherwise, skip password change
        if (!empty($Password)) {
            $stmt = $conn->prepare("UPDATE login1 SET username = ?, email = ?, age = ?, account_type = ?, password = ? WHERE id = ?");
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT); // Hash the password
            $stmt->bind_param("sssisi", $Username, $Email, $Age, $AccountType, $hashedPassword, $id);
        } else {
            $stmt = $conn->prepare("UPDATE login1 SET username = ?, email = ?, age = ?, account_type = ? WHERE id = ?");
            $stmt->bind_param("sssii", $Username, $Email, $Age, $AccountType, $id);
        }

        if ($stmt->execute()) {
            echo "<script>alert('User updated successfully!'); window.location.href = 'view.php';</script>";
        } else {
            echo "<script>alert('Error updating user.');</script>";
        }
        
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../css/update.css?v=<?php echo time(); ?>">
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="../bcplogo.jpg" alt="logo">
            <h2>STUDENT PORTAL</h2>
        </div>
        <ul class="links">
            <h4>Home</h4>
            <li>
            <span class="material-symbols-outlined"></span>
            <a href="view.php">Student Account</a>
          </li>
          <li>
            <span class="material-symbols-outlined"></span>
            <a href="create.php">Create Account</a>
          </li>
            <li>
                <span class="material-symbols-outlined">person</span>
                <a href="../html/homeprofile.html">Profile</a>
            </li>
            <li>
                <span class="material-symbols-outlined">grade</span>
                <a href="../html/grades.html">Grades</a>
            </li>
            <li>
                <span class="material-symbols-outlined">event</span>
                <a href="../html/events.html">Events</a>
            </li>
            <li>
                <span class="material-symbols-outlined">dashboard</span>
                <a href="../html/ewallet.html">E-wallet</a>
            </li>
            <hr>
            <h4>Account</h4>
            <li>
                <span class="material-symbols-outlined">bar_chart</span>
                <a href="../html/overview.html">Overview</a>
            </li>
            <li>
                <span class="material-symbols-outlined">mail</span>
                <a href="../html/concern.html">Concern</a>
            </li>
            <li>
                <span class="material-symbols-outlined">settings</span>
                <a href="../html/setting.html">Settings</a>
            </li>
            <li>
                <span class="material-symbols-outlined">medical_services</span>
                <a href="../html/medical.html">Medical</a>
              </li>
                  <li>
                <span class="material-symbols-outlined">how_to_vote</span>
                <a href="../html/eval.html">Evaluation</a>
              </li>   
              <li class="logout-link">
            <span class="material-symbols-outlined">logout</span>
            <a href="splogin.php" "logout()">Log Out</a>
      </div>
      <script>
          function logout() {
              alert('Logging out...');
              window.location.href = 'login.html'; 
          }
      </script>
          </li>
        </ul>
      </aside>
<body>
    <br><br><br><h1 style="text-align:center;">Update User</h1>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
        <center>
            <label>Username: </label>
            <input type="text" name="Username" value="<?php echo htmlspecialchars($Username); ?>">
            <br><span class="error"><?php echo $UsernameErr; ?></span>
        </center>
        
        <center>
            <label>Email: </label>
            <input type="text" name="Email" value="<?php echo htmlspecialchars($Email); ?>">
            <br><span class="error"><?php echo $EmailErr; ?></span>
        </center>
        
        <center>
            <label>Age: </label>
            <input type="text" name="Age" value="<?php echo htmlspecialchars($Age); ?>">
            <br><span class="error"><?php echo $AgeErr; ?></span>
        </center>
        
        <center>
            <label>Password: </label>
            <input type="password" name="Password">
            <br><span class="error"><?php echo $PasswordErr; ?></span>
        </center>

        <center>
            <label>Confirm Password: </label>
            <input type="password" name="ConfirmPassword">
            <br><span class="error"><?php echo $ConfirmPasswordErr; ?></span>
        </center>

        <center>
            <label>Account Type: </label>
            <select name="AccountType">
                <option value="2" <?php echo $AccountType == 2 ? 'selected' : ''; ?>>Student</option>
                <option value="1" <?php echo $AccountType == 1 ? 'selected' : ''; ?>>Admin</option>
            </select>
        </center>
        
        <center>
            <button type="submit">Update User</button>
        </center>
    </form>
</body>
</html>