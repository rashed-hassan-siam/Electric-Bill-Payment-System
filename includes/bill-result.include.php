<?php
session_start();
include_once '../config/connection.config.php';
$id=$_GET['id'];
$username=$_POST['username'];
$month=$_POST['month'];
$usage=$_POST['usage'];
if ($usage<=100) {
    $bill=$usage*3.5;
} elseif ($usage>100 && $usage<=300) {
    $rest=$usage-100;
    $bill=(100*3.5)+($rest*4);
} elseif ($usage>300 && $usage<=500) {
    $rest=$usage-300;
    $bill=(100*3.5)+(200*4)+($rest*5);
} else {
    $rest=$usage-500;
    $bill=(100*3.5)+(200*4)+(200*5)+($rest*7);
}
$demandCharge=50;
if ($usage<=500) {
    $tax=($bill*5)/100;
} else {
    $tax=($bill*10)/100;
}
$bill=$bill+$demandCharge+$tax;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Monthly Bill</title>
</head>
<body>
    <div class="nav">
    <a href="../index.php">

    <h2 class="home">Electricity</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System</h2>
        </a>
    <nav>
        <?php if($_SESSION['userType']==1){ ?>
            <a href="../consumers.php"><button class="navbtn">Consumers</button></a></br>
            <a href="../complaints.php"><button class="navbtn">Complaints</button></a></br>
        <?php } ?>
        <?php if($_SESSION['userType']==2){ ?>
            <a href="../consumers.php"><button class="navbtn">Consumers</button></a></br>
        <?php } ?>
        <?php if($_SESSION['userType']==3){ ?>
            <a href="bill-history.include.php?id=<?php echo $_SESSION['userId']; ?>"><button class="navbtn">Bill History</button></a></br>
            <a href="../payment.php"><button class="navbtn">Payment</button></a></br>
            <a href="../complaints.php"><button class="navbtn">Complaints</button></a></br>
        <?php } ?>
        <?php if($_SESSION['userType']==4){ ?>
            <a href="../consumers.php"><button class="navbtn">Consumers</button></a></br>
            <a href="../transactions.php"><button class="navbtn">Transactions</button></a></br>
            <a href="../complaints.php"><button class="navbtn">Complaints</button></a></br>
        <?php } ?>
        <a href="logout.include.php"><button class="navbtn">Logout</button></a></br>
    </nav>
    </div>
    <div class="container">
    <h2>Monthly Bill for <?php echo $month; ?> of user <?php echo $username; ?> is <?php echo $bill; ?></h2>
    <?php
    $insert=mysqli_query($conn,"INSERT INTO bill_detail(userId,month,bill) VALUES('$id','$month','$bill')");
    
    ?>
    </div>
    
</body>
</html>