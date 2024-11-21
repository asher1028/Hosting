<?php
include 'userSessionStart.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrNum = $_POST['emailOrNum'];

    // Check if input matches either emails or contact numbers
    $emailFound = in_array($emailOrNum, $usernameToEmail);
    $contactNumFound = in_array($emailOrNum, $usernameToContactNum);

    if ($emailFound || $contactNumFound) {
        $_SESSION['emailorNum'] = $emailOrNum;
        header("Location: userVerify.php");
        exit();
    } else {
        $_SESSION['error'] = 'Email or Contact Number Not Found!';
        header("Location: userForgotPass.php");
        exit();
    }
}
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
        <form id="redBox" method="POST" action="">
            <h1 id="forgotPass" class="forgotPText">Forgot Password</h1>
            <br>
            <p id="textOne" class="forgotPText">Please Enter Your Email Address or Contact Number</p>
            <br>
            <p id="textTwo" class="forgotPText">To Receive a Verification Code</p>
            <br>
            <input type="text" name="emailOrNum" id="txtEmail" placeholder="Email or Contact Number" required>
            <br>
            <input type="submit" value="Send" id="btnSend">
        </form>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<script>alert('".$_SESSION['error']."');</script>";
            unset($_SESSION['error']);
        }
        ?>
    </div>
</body>
</html>
