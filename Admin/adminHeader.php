<?php
include 'adminSessionStart.php';
?>
<header class="w-100">
    <style>
        nav {
            max-height: 200px;
            max-width: auto;
            opacity: 80%;
            background-color: #800000;
        }
        .white {
            color: white;
        }
        #logoSJBP {
            margin: -25px 0 -20px -25px;
            border: 0px solid black;
            width: 270px;
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
            right: 0;
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
    </style>
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <a class="fs-1 white fw-bolder" href="adminHomepage.php"> 
            <img src="../Images/logoSJBP.png" id="logoSJBP" alt="Logo">
        </a>
        <div id="links" class="d-flex">
            <a href="#" class='white' id="usernameDisplay" onclick="toggleDropdown(event)">
                <?php echo isset($_SESSION['adminUsername']) ? htmlspecialchars($_SESSION['adminUsername']) : 'Guest'; ?>
            </a>
            <?php if (isset($_SESSION['adminUsername'])): ?>
                <div class="dropdown">
                    <div id="dropdownContent" class="dropdown-content">
                        <a href="adminSettings.php">Settings</a>
                        <a href="#">Notifications</a>
                        <a href="#" onclick="confirmLogout(event)">Logout</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>

<script>
    function confirmLogout(event) {
        event.preventDefault(); // Prevent default action of anchor tag
        var confirmation = confirm("Do you really want to log out?");
        if (confirmation) {
            window.location.href = "adminLogout.php";
        }
    }

    // Toggle dropdown on click
    function toggleDropdown(event) {
        event.preventDefault();
        var dropdownContent = document.getElementById("dropdownContent");
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    }

    // Close the dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('#usernameDisplay')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    };
</script>
