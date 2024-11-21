<?php
include 'userSessionStart.php';
include 'userAccounts.php';
/*if (!isset($_SESSION['emailorNum'])) {
    header("Location: forgotPass.php");
    exit();
}*/

$userInfo = $_SESSION['emailorNum'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredCode = [
        'box1' => $_POST['digit1'],
        'box2' => $_POST['digit2'],
        'box3' => $_POST['digit3'],
        'box4' => $_POST['digit4']
    ];

    if (isset($verificationCodes[$userInfo]) &&
        $verificationCodes[$userInfo] == $enteredCode) {
        echo "<script>
            alert('Verification successful!');
            window.location.href = 'userNewPassword.php'; // Redirect to success page
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Incorrect code. Please try again.');
            window.location.href = 'userVerify.php'; // Redirect back to the verification page
        </script>";
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
            <h1 id="verifyHeader" class="pVerify">Verify</h1>
            <br>
            <p id="textOne" class="pVerify">Please Enter the 4 Digit Code Sent to</p>
            <br>
            <p id="displayInfo" class="pVerify"><?php echo htmlspecialchars($userInfo); ?></p>
            <input type="number" id="txtBox1" name="digit1" class="inputDigit" maxlength="1" required>
            <input type="number" id="txtBox2" name="digit2" class="inputDigit" maxlength="1" required>
            <input type="number" id="txtBox3" name="digit3" class="inputDigit" maxlength="1" required>
            <input type="number" id="txtBox4" name="digit4" class="inputDigit" maxlength="1" required>
            <br>
            <a href="userForgotPass.php" id="resendCodeLink">Resend Code</a>
            <br>
            <input type="submit" value="Verify" id="btnVerify">
        </form>
    </div>
</body>
</html>
