<?php
include_once '../config/connection.config.php';
$username=$_POST['username'];
$password=$_POST['password'];
$meter=$_POST['meter'];
$slmeter=mysqli_query($conn,"SELECT * FROM meters WHERE meter='$meter'");
if (mysqli_num_rows($slmeter)) {
    echo '<script>
    alert("Meter is already in use by another consumer!");
    location.replace("../applicants.php");
    </script>';
} else {
    
    $insert=mysqli_query($conn,"INSERT INTO users(username,password,type) VALUES('$username','$password',3)");
    if ($insert) {
        $select=mysqli_query($conn,"SELECT * FROM new_applications WHERE username='$username' AND password='$password'");
        if (mysqli_num_rows($select)) {
            $singleApplicant=mysqli_fetch_assoc($select);
            $id=$singleApplicant['id'];
        }
        $delete=mysqli_query($conn,"DELETE FROM new_applications WHERE id='$id'");
        if ($delete) {
            $select2=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
            if (mysqli_num_rows($select2)) {
                $singleUser=mysqli_fetch_assoc($select2);
                $uId=$singleUser['id'];
            }
            $insert2=mysqli_query($conn,"INSERT INTO meters(meter,userId) VALUES('$meter','$uId')");
        }
        if ($insert2) {
            
            header('Location: ../applicants.php');
        }
    }
}
    
        
    
?>