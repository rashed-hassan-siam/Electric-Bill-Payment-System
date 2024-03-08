<?php
    session_start();
    include_once '../config/connection.config.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($select)) {
        $user = mysqli_fetch_assoc($select);
        $_SESSION['userId'] = $user['id'];
        $_SESSION['userType'] = $user['type'];
        $_SESSION['userName'] = $user['username'];
        header('Location: ../index.php');
    } else {
        echo '<script>alert("Wrong credentials!");
        location.replace("../login.php");</script>';
    }
?>