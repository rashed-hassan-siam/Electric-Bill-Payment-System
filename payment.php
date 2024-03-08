<?php
session_start();
include_once 'config/connection.config.php';
if (!isset($_SESSION['userType']) || $_SESSION['userType']!=3) {
    header('Location: index.php');
}
$id=$_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Payment</title>
</head>
<body>
<div class="nav">
<a href="index.php">

<h2 class="home">Electricity</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System</h2>
</a>
        <nav>
        <?php if($_SESSION['userType']==1){ ?>
            <a href="consumers.php"><button class="navbtn">Consumers</button></a></br>
            <a href="complaints.php"><button class="navbtn">Complaints</button></a></br>
        <?php } ?>
        <?php if($_SESSION['userType']==2){ ?>
            <a href="consumers.php"><button class="navbtn">Consumers</button></a></br>
        <?php } ?>
        <?php if($_SESSION['userType']==3){ ?>
            <a href="includes/bill-history.include.php?id=<?php echo $_SESSION['userId']; ?>"><button class="navbtn">Bill History</button></a></br>
            <a href="payment.php"><button class="navbtn">Payment</button></a></br>
            <a href="complaints.php"><button class="navbtn">Complaints</button></a></br>
        <?php } ?>
        <?php if($_SESSION['userType']==4){ ?>
            <a href="consumers.php"><button class="navbtn">Consumers</button></a></br>
            <a href="transactions.php"><button class="navbtn">Transactions</button></a></br>
            <a href="complaints.php"><button class="navbtn">Complaints</button></a></br>
        <?php } ?>
        <a href="includes/logout.include.php"><button class="navbtn">Logout</button></a></br>
        </nav>
    </div>
    <div class="container">
        <h2>Payment</h2>
    <?php
    $select=mysqli_query($conn,"SELECT * FROM bill_detail WHERE userId='$id'");
    ?>
    <table class="list">
        <tr>
            <th>Month</th>
            <th>Bill</th>
            <th>Paid</th>
        </tr>
        <?php
        $paid=1;
        if (mysqli_num_rows($select)) {
        while ($singleBill=mysqli_fetch_assoc($select)) { ?>
            <tr>
                <td><?php echo $singleBill['month']; ?></td>
                <td><?php echo $singleBill['bill']; ?></td>
                <td><?php
                if ($singleBill['isPaid']) {
                    echo 'Yes';
                } else {
                    $paid=0;
                    echo 'No';
                }  ?></td>
            </tr>
    <?php    }
    }
    ?>
    </table>
    <?php
    if ($paid) { ?>
        <h2>You have already paid your bills.</h2>
    <?php } else { ?>
        <form action="includes/payment.include.php?id=<?php echo $id; ?>" method="POST">
        <button class="submit">Pay Bill</button>
        </form>
    <?php }
    ?>
    </div>
    
    
</body>
</html>