<?php
include 'userSessionStart.php';

if (!isset($_SESSION['username'])) {
    header("Location: userLogin.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parish of San Juan</title>
        <link rel="stylesheet" href="userBaptism4.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'userHeader.php'; ?>
        <div id="">
        </div>
    </body>
</html>
