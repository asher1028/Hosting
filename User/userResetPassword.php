<?php
include 'userSessionStart.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parish of San Juan</title>
        <link rel="stylesheet" href="passRecovery.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'userHeader.php'; ?>
        <div id="whiteBox">
            <form id="redBox" method="POST" action="userResetPasswordProcess.php">
                <h1 id="createNewPassword" class="changePassText">Create New Password</h1>
                <br>
                <p id="textOne" class="changePassText">Your New Password Must Be Different</p>
                <br>
                <p id="textTwo" class="changePassText">From Previously Used Password</p>
                <br>
                <input type="password" name="newPass" id="txtNewPass" placeholder="New Password" class="newPassText" required>
                <br>
                <input type="password" name="confirmNewPass" id="txtConfirmNewPass" placeholder="Confirm Password" class="newPassText" required>
                <br>
                <input type="submit" value="Save" id="btnSave">
                <br>
            </form>
        </div>
    </body>
</html>
