


<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <div class="form">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>

            <form action="login.php" method="post">
                <label>Email:</label><br>
                <input type="email" placeholder="Enter Email" name="email" required><br><br>

                <label>Password:</label><br>
                <input type="password" placeholder="Enter Password" name="password" required><br><br>

                <input type="submit" value="Login" name="login">
            </form>

            <p>Not registered yet? <a href="registration.php">Register Here</a></p>
        </div>
    </div>
</body>
</html>
