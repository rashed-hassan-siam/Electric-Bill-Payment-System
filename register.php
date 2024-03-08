<?php
session_start();
if(isset($_SESSION['userId']) && $_SESSION['userId']!=NULL){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Register</title>
</head>
<body>
<div class="nav">
<a href="index.php">

<h2 class="home">Electricity</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System</h2>
</a>
    </div>
    <div class="container">
        <h2>Register</h2>
        <form action="includes/register.include.php" method="POST">
            <table class="form">
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" name="username" id="username" placeholder="Enter username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password" placeholder="Enter password" required></td>
                </tr>
            </table>
            <button class="submit">Register</button>
        </form>
        <h4>Already have an account? <a href="login.php"><button class="submit">Login</button></a></h4>
    </div>
</body>
</html>