<?php
include_once '../config/connection.config.php';
$username=$_POST['username'];
$password=$_POST['password'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Confirmation</title>
</head>
<body>
    <div class="nav">
    <a href="../index.php">

    <h2 class="home">Electricity</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System</h2>
        </a>
    </div>
    <div class="container">

    <?php
    $select=mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $select2=mysqli_query($conn, "SELECT * FROM new_applications WHERE username='$username'");
    if(mysqli_num_rows($select) || mysqli_num_rows($select2)){
        echo '<script>
        alert("Username already exists!");
        location.replace("../register.php");
        </script>';
     } else {
            $insert=mysqli_query($conn, "INSERT INTO new_applications(username,password) VALUES('$username','$password');");
            echo '<script>
            alert("Thanks for registering. Your request is being processed!");
            location.replace("../register.php");
            </script>';
     }
    ?>
    </div>
</body>
</html>