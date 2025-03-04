<?php
include '../userSessionStart.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parish of San Juan</title>
        <link rel="stylesheet" href="userApplicationDetails.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script>
            function btnhome(event) {
                event.preventDefault();
                window.location.href = "../index.php";
            }
        </script>
    </head>
    <body>
        <?php include '../userHeader.php'; ?>
        <div id="details">
            <a href="#" id="baptismLabel" class="label">Application</a>
            <div id="thankYou">
                <div id="forBG">
                    <div id="checkMark"></div>
                </div>
                <p id="thankU">Thank You!</p>
                <p id="requestSentNotice">Your request has been sent.</p>
                <button id="btnHome" type="button" class="btn btn-success" onclick="btnhome(event)">HOME</button>
            </div>
        </div>
    </body>
</html>
