<?php
include_once '../config/connection.config.php';
$id=$_GET['id'];
$select=mysqli_query($conn,"SELECT * FROM bill_detail WHERE userId='$id' AND isPaid='0'");
if (mysqli_num_rows($select)) {
    while ($single=mysqli_fetch_assoc($select)) {
        $month=$single['month'];
        $bill=$single['bill'];
        $update=mysqli_query($conn,"UPDATE bill_detail SET isPaid='1' WHERE userId='$id' AND month='$month'");
        if ($update) {
            $insert=mysqli_query($conn,"INSERT INTO transactions(userId,month,bill) VALUES('$id','$month','$bill')");
        }
    }
}
    echo '<script>
    alert("Thanks for your payment!");
    location.replace("../payment.php");
    </script>';
?>