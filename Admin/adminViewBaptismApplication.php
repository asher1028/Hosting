<?php
include 'adminSessionStart.php';
include '../connection.php'; // Make sure to include the database connection

if (!isset($_SESSION['adminUsername'])) {
    header("Location: adminLogin.php");
    exit();
}

// Get the record ID from the URL
if (isset($_GET['id'])) {
    $record_id = (int)$_GET['id'];

    // Fetch the record from the database
    $query = "SELECT * FROM baptism_applications WHERE id = $record_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit; // Exit if no record found
    }
} else {
    echo "Invalid record ID.";
    exit; // Exit if no ID is provided
}

// Handle the form submission for updating the is_forwarded column
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $update_query = "UPDATE baptism_applications SET is_forwarded = 1 WHERE id = $record_id";
    
    if ($conn->query($update_query) === TRUE) {
        header("Location: adminBaptismTable.php"); // Redirect after successful update
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parish of San Juan</title>
    <link rel="stylesheet" href="adminHomepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
        function btnback(event) {
            event.preventDefault();
            window.location.href = "adminBaptismTable.php";
        }
    </script>
</head>
<body>
    <?php include 'adminHeader.php'; ?>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-2'>
                <?php include 'adminSidebar.php'; ?>
            </div>
            <div class="container mt-5">
                <h2 id="baptismApplicationLabel">Baptism Application Details</h2>
                <div id="userReqInfo">
                    <div id="forLabel">
                        <p id="reqInfoLabel">Request No. <?php echo htmlspecialchars($record['id']); ?></p>
                    </div>
                    <div id="applicantInfos" class="d-flex">
                        <div id="leftSide">
                            <p class="applicantData"><?php echo htmlspecialchars($record['child_name']); ?></p>
                            <p class="applicantDataLabel">Name of Child</p>
                            <p class="applicantData"><?php echo htmlspecialchars($record['father_name']); ?></p>
                            <p class="applicantDataLabel">Name of Father</p>
                            <p class="applicantData"><?php echo htmlspecialchars($record['godfather_name']); ?></p>
                            <p class="applicantDataLabel">Name of Godfather</p>
                            <p class="applicantData"><?php echo htmlspecialchars($record['contact_info']); ?></p>
                            <p class="applicantDataLabel">Contact Info</p>
                        </div>
                        <div id="rightSide">
                            <p class="applicantData"><?php echo htmlspecialchars($record['date_baptized']); ?></p>
                            <p class="applicantDataLabel">Date</p>
                            <p class="applicantData"><?php echo htmlspecialchars($record['mother_name']); ?></p>
                            <p class="applicantDataLabel">Name of Mother</p>
                            <p class="applicantData"><?php echo htmlspecialchars($record['godmother_name']); ?></p>
                            <p class="applicantDataLabel">Name of Godmother</p>
                            <p class="applicantData"><?php echo htmlspecialchars($record['time_baptized']); ?></p>
                            <p class="applicantDataLabel">Time</p>
                        </div>
                    </div>
                    <div id="forComments">
                        <div id="bottomSide">
                            <p class="funeralApplicantData"><?php echo htmlspecialchars($record['comments']); ?></p>
                        </div>
                        <div id="commentsLabel">
                            <p class="funeralApplicantDataLabel">Comments</p>
                        </div>
                    </div>
                    <form method="post" action="">
                        <div id="forButtons" class="d-flex justify-content-between mt-4">
                            <div id="leftButtons">
                                <button id="backButton" type="button" onclick="btnback(event)">Back</button>
                            </div>
                            <div id="rightButtons" class="d-flex">
                                <button id="archiveButton">Archive</button>
                                <button id="sendButton" name="send" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
