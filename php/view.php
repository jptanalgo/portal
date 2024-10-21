<?php 
// Include the database connection file
include 'connections.php'; 

$Username = $Password = $ConfirmPassword = $Email = $Age = $AccountType = "";
$UsernameErr = $PasswordErr = $ConfirmPasswordErr = $EmailErr = $AgeErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation logic here...
    // Same validation as your original code...

    // Insert data if no validation errors
    if (empty($UsernameErr) && empty($PasswordErr) && empty($ConfirmPasswordErr) && empty($EmailErr) && empty($AgeErr)) {
        $stmt = $conn->prepare("INSERT INTO login1 (username, password, cpassword, age, email, account_type) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $Username, $Password, $ConfirmPassword, $Age, $Email, $AccountType);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "<script>alert('Error: Could not register.');</script>";
        }
        $stmt->close();
    }
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM login1 WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT PORTAL</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../css/view.css?v=<?php echo time(); ?>">
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
    <center>
        
        <!-- Password and other fields here -->
        <!-- Account Type -->
        

    <!-- Display the user table -->
    <br><br><br><h2 style="text-align:center;">Registered Users</h2>
    <table border="1" width="80%" align="center">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Age</th>
            <th>Account Type</th>
            <th>Actions</th>
        </tr>
        <?php 
        // Fetch all users from the login1 table
        $result = $conn->query("SELECT * FROM login1");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . ($row['account_type'] == 2 ? 'Student' : 'Admin') . "</td>";
            echo "<td>
                    <a href='update.php?id=" . $row['id'] . "'>Update</a> | 
                    <a href='delete.php?delete=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>