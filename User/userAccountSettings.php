<?php
include '../userSessionStart.php'; // Make sure session is started
include '../connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: userLogin.php"); // Redirect if not logged in
    exit(); // Make sure no further code is executed after redirect
}

// If session is started properly, continue with the rest of the code
$username = $_SESSION['username'];

// Prepare and execute SQL statement to fetch user details
$stmt = $conn->prepare("SELECT username, email, contact_num, profile_pic, address, birthday FROM user WHERE username = ?");
$stmt->bind_param("s", $username); // "s" specifies the variable type => string
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if user data is retrieved
if ($user) {
    // Extract user information
    $user_username = isset($user['username']) ? $user['username'] : '';
    $user_email = isset($user['email']) ? $user['email'] : '';
    $user_contact = isset($user['contact_num']) ? $user['contact_num'] : '';
    $user_profile_picture = isset($user['profile_pic']) ? $user['profile_pic'] : ''; // Profile picture
    $user_address = isset($user['address']) ? $user['address'] : '';
    $user_birthday = isset($user['birthday']) ? $user['birthday'] : '';
} else {
    // Handle error: user not found
    echo "User not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data from form
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $address = $_POST['address'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    
    // Default value for profile picture if not updated
    $profile_pic = NULL;

    // Prepare SQL for updating user data
    $update_sql = "UPDATE user SET email = ?, contact_num = ?, address = ?, birthday = ?";

    // Check if a new profile picture was uploaded
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $file = $_FILES['profile_picture'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Check if the file is an image
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($file_ext, $allowed_extensions)) {
            // Check file size (e.g., limit to 5MB)
            if ($file_size <= 5 * 1024 * 1024) {
                // Generate a unique name for the file
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $upload_path = '../uploads/profile_pictures/' . $new_file_name;

                // Move the uploaded file to the desired directory
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // Set profile picture path for update
                    $profile_pic = $upload_path;
                } else {
                    echo "Error uploading the file.";
                    exit();
                }
            } else {
                echo "File size exceeds the 5MB limit.";
                exit();
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
            exit();
        }
    }

    // Add profile_pic to the SQL query if it has been set
    if ($profile_pic !== NULL) {
        $update_sql .= ", profile_pic = ?";
    }

    // Finalize the SQL query with the WHERE condition
    $update_sql .= " WHERE username = ?";

    // Prepare the statement to update the user data
    $stmt = $conn->prepare($update_sql);

    // Bind the parameters based on what data is available
    if ($profile_pic !== NULL) {
        $stmt->bind_param("ssssss", $email, $contact, $address, $birthday, $profile_pic, $username);
    } else {
        $stmt->bind_param("sssss", $email, $contact, $address, $birthday, $username);
    }

    // Execute the update query
    if ($stmt->execute()) {
        // Redirect to user landing page after successful update
        header("Location: ../index.php");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Parish of San Juan</title>
    <link rel="stylesheet" href="userSettings.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
        function changepass(event) {
            event.preventDefault();
            window.location.href = "userChangePassword.php"; // Redirect to password change page
        }

        function btnback() {
            event.preventDefault();
            window.location.href="../index.php";
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php include '../userHeader.php'; ?>
    <div id="settingsDiv" class="container">
        <h1 class="text-center">Account Settings</h1>
        <form class="row" method="post" action="" enctype="multipart/form-data">
            <!-- Left side: Username to Contact No. -->
            <div class="col-md-6">
                <input type="text" name="username" class="form-control mb-3 fields" placeholder="Username" value="<?php echo htmlspecialchars($user_username); ?>" readonly>
                <input type="email" name="email" class="form-control mb-3 fields" placeholder="Email" value="<?php echo htmlspecialchars($user_email); ?>">
                <input type="number" name="contact" class="form-control mb-3 fields" placeholder="Contact No." value="<?php echo htmlspecialchars($user_contact); ?>">
            </div>
            <!-- Right side: Password field with toggle and Change Password button -->
            <div class="col-md-6">
                <input type="text" name="address" class="form-control mb-3 fields" placeholder="Address" value="<?php echo htmlspecialchars($user_address); ?>">
                <input type="date" name="birthday" class="form-control mb-3 fields" placeholder="Birthday" value="<?php echo htmlspecialchars($user_birthday); ?>">

                <!-- Profile Picture Upload -->
                <input type="file" name="profile_picture" class="form-control mb-3 fields" accept="image/*">
            </div>
            <input type="button" class="btn btn-secondary fields w-100 mb-3" value="Change Password" onclick="changepass(event)" style="margin: 0 15px;">
            <!-- Buttons below both columns -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                <button type="button" class="btn btn-danger" onclick="btnback(event)">Back</button>
            </div>
        </form>
    </div>
</body>
</html>