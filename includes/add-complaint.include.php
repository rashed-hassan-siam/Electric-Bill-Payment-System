<?php
include_once '../config/connection.config.php';
$id=$_GET['id'];
$complaint=mysqli_real_escape_string($conn, $_POST['complaint']);
$insert=mysqli_query($conn,"INSERT INTO complaints(userId,complaint) VALUES('$id','$complaint')");
if ($insert) {
    header('Location: ../complaints.php');
}
?>