<?php
include 'adminSessionStart.php';

if (!isset($_SESSION['adminUsername'])) {
   header("Location: adminLogin.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parish of San Juan</title>
        <link rel="stylesheet" href="adminHomepage.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'adminHeader.php'; ?>
        <div class='container-fluid'>
        <div class='row'>
            <div class='col-2'>
                <?php include 'adminSidebar.php'; ?>
            </div>
        </div>
        </div>
    </body>
</html>