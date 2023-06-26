<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <div class="dashboard">
            <h1>Welcome to Dashboard</h1>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>
</html>
