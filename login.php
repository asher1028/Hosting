<?php
session_start(); // Start the session
include 'connection.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $loginInput = $_POST['loginInput']; // Username, Email, or Contact Number
    $password = $_POST['password']; // Password
    $userType = $_POST['userType']; // User Type (Super Admin or Admin)

    // Based on the userType, prepare the appropriate query and session
    if ($userType === 'super_admin') {
        // Super Admin login query
        $stmt = $conn->prepare("SELECT username, password FROM super_admin WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $loginInput, $loginInput); // Bind the username/email input
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) {
                $_SESSION['superAdminUsername'] = $row['username'];
                header("Location: ../SuperAdmin/superAdminHomepage.php"); // Redirect to Super Admin homepage
                exit();
            } else {
                $error = "Incorrect password for Super Admin.";
            }
        } else {
            $error = "No Super Admin found with that username or email.";
        }
    } elseif ($userType === 'admin') {
        // Admin login query
        $stmt = $conn->prepare("SELECT username, password FROM admin WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $loginInput, $loginInput); // Bind the username/email input
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) {
                $_SESSION['adminUsername'] = $row['username'];
                header("Location: ../Admin/adminHomepage.php"); // Redirect to Admin homepage
                exit();
            } else {
                $error = "Incorrect password for Admin.";
            }
        } else {
            $error = "No Admin found with that username or email.";
        }
    } else {
        $error = "Please select a user type.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Parish of San Juan</title>
   <link rel="stylesheet" href="../Admin/adminLogin.css">
</head>
<body>
    <div id="loginDiv">
        <form id="loginForm" method="POST" action="">
            <img src="../Images/logoSJBP.png" id="logoSJBP" alt="Parish Logo">
            <br>
            <label for="loginForm" id="loginFormLabel">Please Login</label><br>
            
            <!-- Login Input (Username or Email) -->
            <input type="text" name="loginInput" placeholder="Username, Email or Contact Number" id="txtUser" required>
            <br>
            
            <!-- Password Input -->
            <input type="password" name="password" placeholder="Password" id="txtPass" required>
            <br>
            
            <!-- User Type Selection -->
            <div>
                <label for="userType">Select User Type: </label>
                <select name="userType" id="userType" required>
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
            <br>
            
            <!-- Submit Button -->
            <input type="submit" value="Log in" id="btnLogin">
        </form>

        <!-- Error Message -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
