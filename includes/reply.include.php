<?php
session_start();
include_once '../config/connection.config.php';
$id=$_SESSION['userId'];
$cId=$_POST['cid'];
$reply=mysqli_real_escape_string($conn, $_POST['reply']);
$update=mysqli_query($conn, "UPDATE complaints SET reply='$reply',adminId='$id' WHERE id='$cId'");
if ($update) {
    header('Location: ../complaints.php');
}
?>