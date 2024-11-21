<?php
include '../userSessionStart.php';
include '../connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: userLogin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect data from the form
    $username = $_SESSION['username'];
    $subject = htmlspecialchars($_POST['subject']); // from the form input 'subject'
    $body = htmlspecialchars($_POST['message']); // from the form textarea 'message'

    // SQL query to insert the message
    $sql = "INSERT INTO messages (username, subject, body) VALUES (?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters to the query
        $stmt->bind_param("sss", $username, $subject, $body);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    session_unset();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Parish of San Juan</title>
    <link rel="stylesheet" href="comments.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #serviceLink {
            color: red;
        }
    </style>
</head>
<script>
    function btnback(event) {
        event.preventDefault();
        window.location.href = "userService.php";
    }
    function validateForm() {
        var subject = document.querySelector('input[placeholder="Subject"]').value.trim().replace(/\s+/g, ' ');
        var message = document.querySelector('textarea[placeholder="Message"]').value.trim().replace(/\s+/g, ' ');

        if (!subject || !message) {
            alert('All fields must be filled out before proceeding.');
            return false;
        }

        return true;
    }

    function btnsend(event) {
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
</script>
<body>
    <?php include '../userHeader.php'; ?>
    <div id="formFillUp">
        <a href="#" id="commentsLabel" class="label">Message</a>
        <div id="notice">
            <form method="POST" action="">
                <div id="forSubject">
                    <input type="text" id="subjectText" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-container">
                    <textarea id="commentsText" name="message" placeholder="Message" required></textarea>
                </div>
                <!-- Buttons -->
                <button id="btnBack" type="button" class="btn btn-danger" onclick="btnback(event)">BACK</button>
                <button id="btnSend" type="submit" class="btn btn-success" onclick="btnsend(event)">SEND</button>
            </form>
        </div>
    </div>
</body>
</html>
