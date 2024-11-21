<?php 
include 'userSessionStart.php'; 
include 'connection.php'; 
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Query to get the profile picture
    $query = "SELECT profile_pic FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($profile_picture);
    $stmt->fetch();

    // Check if the user has a profile picture
    if ($profile_picture) {
        $profilePicPath = "../uploads/" . $profile_picture; // Assuming pictures are stored in 'uploads' folder
    } else {
        $profilePicPath = "../Images/profileIcon.png"; // Default image
    }
}
?>
<header class="w-100">
    <link rel="stylesheet" href="userHeader1.css">
    <style>
        /* Main navigation styling */
        .containernav {
            width: 100%;
            position: relative;
            top: 0;
            z-index: 1000;
        }

        nav {
            opacity: 80%;
            background-color: #800000;
            height: 80px;  /* Increased height for better spacing */
            display: flex;
            align-items: center;
            padding: 0 20px;
            margin-bottom: 20px;
        }

        .white {
            color: white;
        }

        #logoSJBPnav {
            margin: -18px 0 -20px -30px;
            width: 200px;
        }

        #logo-container {
            position: relative;
            padding-left: 20px;
        }

        /* Update this section to add a left margin to the links */
        #links {
            margin-left: 20px;  /* Added 20px left margin */
            display: flex;
            gap: 20px;
        }

        .navbar {
            position: relative;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show dropdown on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Nested dropdown styles */
        .sub-dropdown {
            position: relative;
        }

        .sub-dropdown-content {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .sub-dropdown:hover .sub-dropdown-content {
            display: block;
        }
    </style>

    <div class="containernav">
        <nav class="navbar navbar-expand-lg d-flex justify-content-center">
            <!-- Logo on the left -->
            <div id="logo-container">
                <a href="../index.php"><img src="../Images/logoSJBP.png" alt="Logo SJBP" id="logoSJBPnav"></a>
            </div>
            
            <!-- Navigation links in the center -->
            <div id="links" class="d-flex">
                <a href="../index.php" id="homeLink" class="mx-3 white">Home</a>

                <!-- Services Dropdown Button -->
                <div class="dropdown">
                    <a href="#" class="mx-3 white dropbtn">Service</a>
                    <div class="dropdown-content">
                        <a href="#" onclick="checkLogin('../User/userBaptismSchedule.php')">Baptism</a>
                        <a href="#" onclick="checkLogin('../User/userWeddingSchedule.php')">Wedding</a> 
                        <div class="sub-dropdown">
                            <a>Mass</a>
                            <div class="sub-dropdown-content">
                                <a href="../User/userFuneralScheduleApplication.php">Funeral Mass</a>
                                <a href="../User/userPrivateMass.php">Private Mass</a>
                            </div>
                        </div>
                        <div class="sub-dropdown">
                            <a>Request</a>
                            <div class="sub-dropdown-content">
                                <a href="../User/userBaptismCertificateRequest.php">Baptism Certificate</a>
                                <a href="../User/userWeddingCertificateRequest.php">Marriage Certificate</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Dropdown Button -->
                <div class="dropdown">
                    <a href="#" class="mx-3 white dropbtn">About</a>
                    <div class="dropdown-content">
                        <a href="../User/userAbout.php">History</a>
                        <a href="../User/userSacraments.php">Sacraments</a>
                    </div>
                </div>

                <a href="../User/userContactUs.php" class="mx-3 white">Contact Us</a>

                <?php if (isset($_SESSION['username'])): ?>
     
                    
                    <!-- Display profile picture if logged in -->
                    <img src="<?php echo $profilePicPath; ?>" style="max-width: 50px; margin-right: -40px; border-radius: 50px;" alt="Profile Picture">
                    <div class="dropdown">
                        <a href="#" class="dropbtn white mx-5" id="userDropdownBtn"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                        <div id="dropdownContent" class="dropdown-content">
                            <a href="../User/userAccountSettings.php">Settings</a>
                            <a href="#">Notifications</a>
                            <a href="#" onclick="confirmLogout(event)">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Login link if not logged in -->
                    <a href="../User/userLogin.php" class="mx-3 white">Login</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>

<script>
    function checkLogin(redirectUrl) {
        <?php if (isset($_SESSION['username'])): ?>
            window.location.href = redirectUrl;
        <?php else: ?>
            alert("You must be logged in to continue.");
            window.location.href = "../User/userLogin.php";
        <?php endif; ?>
    }

    function confirmLogout(event) {
        event.preventDefault();
        if (confirm("Do you really want to log out?")) {
            window.location.href = "../User/userLogout.php";
        }
    }
</script>

