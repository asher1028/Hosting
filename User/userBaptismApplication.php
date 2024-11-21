<?php
include '../userSessionStart.php';
include '../connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: userLogin.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get the input values
    $childName = htmlspecialchars($_POST['childName']);
    $motherName = htmlspecialchars($_POST['motherName']);
    $fatherName = htmlspecialchars($_POST['fatherName']);
    $godmotherName = htmlspecialchars($_POST['godmotherName']);
    $godfatherName = htmlspecialchars($_POST['godfatherName']);
    $datePick = $_POST['datePick'];
    $timePick = $_POST['timePick'];
    $contact = htmlspecialchars($_POST['contact']);
    $commentText = htmlspecialchars($_POST['commentText']);

    // Store values in session
    $_SESSION['childName'] = $childName;
    $_SESSION['motherName'] = $motherName;
    $_SESSION['fatherName'] = $fatherName;
    $_SESSION['godmotherName'] = $godmotherName;
    $_SESSION['godfatherName'] = $godfatherName;
    $_SESSION['datePick'] = $datePick;
    $_SESSION['timePick'] = $timePick;
    $_SESSION['contact'] = $contact;
    $_SESSION['commentText'] = $commentText;

    // Redirect to confirmation page
    header("Location: userBaptismApplicationConfirmation.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Parish of San Juan</title>
    <link rel="stylesheet" href="userBaptismApplication2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
        // Function to go back
        function btnback(event) {
            event.preventDefault();
            window.location.href = "userBaptismSchedule.php";
        }

        // Function to validate the form
        function validateForm() {
            // Get all form fields and trim extra spaces
            var childName = document.querySelector('input[placeholder="Name of Child"]').value.trim().replace(/\s+/g, ' ');
            var motherName = document.querySelector('input[placeholder="Name of Mother"]').value.trim().replace(/\s+/g, ' ');
            var fatherName = document.querySelector('input[placeholder="Name of Father"]').value.trim().replace(/\s+/g, ' ');
            var godmotherName = document.querySelector('input[placeholder="Name of Godmother"]').value.trim().replace(/\s+/g, ' ');
            var godfatherName = document.querySelector('input[placeholder="Name of Godfather"]').value.trim().replace(/\s+/g, ' ');
            var datePick = document.getElementById('datePick').value; // No trim needed for date input
            var timePick = document.getElementById('timePick').value; // No trim needed for date input
            var contact = document.querySelector('input[placeholder="Mobile number or email"]').value.trim().replace(/\s+/g, ' ');
            var commentText = document.getElementById('commentText').value.trim().replace(/\s+/g, ' ');

            // Check if any field is empty
            if (!childName || !motherName || !fatherName || !godmotherName || !godfatherName || !datePick || !timePick || !contact || !commentText) {
                alert('All fields must be filled out before proceeding.');
                return false;
            }

            return true;
        }

        // Function to proceed to next step
        function btnnext(event) {
            event.preventDefault();
            if (validateForm()) {
                // Prepare form data for submission
                var formData = new FormData(document.querySelector('form'));
                fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url; // Redirect to confirmation page
                    }
                });
            }
        }

        // Restrict past dates and times
        window.onload = function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('datePick').setAttribute('min', today);
        };

        document.getElementById('datePick').addEventListener('change', function() {
            var selectedDate = this.value;
            var today = new Date().toISOString().split('T')[0];

            // If the selected date is today, set the minimum selectable time to the current time
            if (selectedDate === today) {
                var currentTime = new Date().toISOString().split('T')[1].slice(0, 5);
                document.getElementById('timePick').min = currentTime;
            } else {
                // Remove the time restriction for future dates
                document.getElementById('timePick').removeAttribute('min');
            }
        });
    </script>
</head>
<body>
    <?php include '../userHeader.php'; ?>
    <div id="formFillUp">
        <a href="#" id="baptismLabel" class="label">Baptism</a>
        <div id="notice">
            <form>
                <p id="reqInfoLabel">Application Information</p>
                <div class="form-container">
                    <!-- Left Side Inputs -->
                    <div class="left-side">
                        <p id="childNameLabel">Name of Child</p>
                        <input type="text" name="childName" placeholder="Name of Child" class="textFields">
                        <p id="motherNameLabel">Name of Mother</p>
                        <input type="text" name="motherName" placeholder="Name of Mother" class="textFields">
                        <p id="fatherNameLabel">Name of Father</p>
                        <input type="text" name="fatherName" placeholder="Name of Father" class="textFields">
                        <p id="godmotherNameLabel">Name of Godmother</p>
                        <input type="text" name="godmotherName" placeholder="Name of Godmother" class="textFields">
                    </div>
                    <!-- Right Side Inputs -->
                    <div class="right-side">
                        <p id="godfatherNameLabel">Name of Godfather</p>
                        <input type="text" name="godfatherName" placeholder="Name of Godfather" class="textFields">
                        <p id="dateTimeLabel">Date and Time of Baptism</p>
                        <div class="date-time-container">
                            <input type="date" id="datePick" name="datePick" class="textFields">
                            <input type="time" id="timePick" name="timePick" class="textFields">
                        </div>
                        <p id="contactLabel">Contact Info.</p>
                        <input type="text" name="contact" placeholder="Mobile number or email" class="textFields">
                        <p id="commentLabel">Comments</p>
                        <textarea id="commentText" name="commentText" required></textarea>
                    </div>
                </div>
                <!-- Buttons -->
                <button id="btnBack" type="button" class="btn btn-danger" onclick="btnback(event)">BACK</button>
                <button id="btnNext" type="button" class="btn btn-success" onclick="btnnext(event)">NEXT</button>
            </form>
        </div>
    </div>
</body>
</html>
