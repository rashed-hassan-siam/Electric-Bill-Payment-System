<?php
include_once '../config/connection.config.php';
$id=$_GET['id'];
$delete=mysqli_query($conn,"DELETE FROM users WHERE id='$id'");
if ($delete) {
    $delete2=mysqli_query($conn,"DELETE FROM meters WHERE userId='$id'");
    if ($delete2) {
        
        header('Location: ../consumers.php');
    }
}
?>