<?php 
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location: ../controllers/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <div class="container my-5 d-flex justify-content-between align-items-center">
        <h1>welcome: <?= $_SESSION['username'] ?></h1>
        <a href="../controllers/logout.php">Logout</a>
    </div>
</body>
</html>

