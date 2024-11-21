<?php 
include './User/userSessionStart.php'; 
?>
<header class="w-100">
    <link rel="stylesheet" href="./User/userHeader1.css">
    <style>
        .containernav {
            width: 100%;
        }
        nav {
            opacity: 80%;
            background-color: #800000;
            height: 70px;
        }
        .white {
            color: white;
        }
        #logoSJBPnav {
            margin: -18px 0 -20px -30px;
            border: 0px solid black;
            width: 290px;
        }
        #logo-container {
            position: absolute;
            left: 0;
            padding-left: 20px; 
        }
        #links {
            margin-left: auto;
            margin-right: auto;
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
                <a href="userLandingpage.php"><img src="../Images/logoSJBP.png" alt="Logo SJBP" id="logoSJBPnav"></a>
            </div>
            
            <!-- Navigation links in the center -->
            <div id="links" class="d-flex">
                <a href="userLandingpage.php" id="homeLink" class="mx-5">Home</a>

                <!-- Services Dropdown Button -->
                <div class="dropdown">
    <a href="#" id="serviceLink" class="mx-5 white dropbtn">Service</a>
    <div class="dropdown-content">
        <a href="#" onclick="checkLogin('./User/userBaptismSchedule.php')">Baptism</a>
        <a href="#" onclick="checkLogin('./User/userWeddingSchedule.php')">Wedding</a> 

        <div class="sub-dropdown">
            <a>Mass</a>
            <div class="sub-dropdown-content">
                <a href="./User/userFuneralScheduleApplication.php">Funeral Mass</a>
                <a href="./User/userPrivateMass.php">Private Mass</a>
            </div>
        </div>

        <!-- Request Sub-Dropdown -->
        <div class="sub-dropdown">
            <a>Certificate Request</a>
            <div class="sub-dropdown-content">
                <a href="./User/userBaptismCertificateRequest.php">Baptism Certificate</a>
                <a href="./User/userWeddingCertificateRequest.php">Marriage Certificate</a>
            </div>
        </div>
    </div>
</div>

<script>
    function checkLogin(redirectUrl) {
        <?php if (isset($_SESSION['username'])): ?>
            // If user is logged in, redirect to the requested page
            window.location.href = redirectUrl;
        <?php else: ?>
            // If user is not logged in, show an alert and redirect to the login page
            alert("You must be logged in to continue.");
            window.location.href = "./User/userLogin.php";
        <?php endif; ?>
    }
</script>


                <!-- About Dropdown Button -->
                <div class="dropdown">
                    <a href="#" id="aboutLink" class="mx-5 white dropbtn">About</a>
                    <div class="dropdown-content">
                        <a href="./User/userAbout.php">History</a>
                        <a href="./User/userSacraments.php">Sacraments</a>
                    </div>
                </div>

                <a href="userContactUs.php" id="contactLink" class="mx-5">Contact Us</a>

                <?php if (isset($_SESSION['username'])): ?>
                    <!-- User dropdown if logged in -->
                    <div class="dropdown">
                        <a href="#" class="dropbtn white mx-5" id="userDropdownBtn"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                        <div id="dropdownContent" class="dropdown-content">
                            <a href="./User/userAccountSettings.php">Settings</a>
                            <a href="#">Notifications</a>
                            <a href="#" onclick="confirmLogout(event)">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Login link if not logged in -->
                    <a href="./User/userLogin.php" class='white mx-5' id="loginLink">Login</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>

<script>
    function checkLoginAndRedirect(page) {
        <?php if (!isset($_SESSION['username'])): ?>
            alert("Please log in to access this page.");
            window.location.href = "./User/userLogin.php";
        <?php else: ?>
            window.location.href = page;
        <?php endif; ?>
    }

    function confirmLogout(event) {
        event.preventDefault();
        var confirmation = confirm("Do you really want to log out?");
        if (confirmation) {
            window.location.href = "./User/userLogout.php";
        }
    }
</script>
