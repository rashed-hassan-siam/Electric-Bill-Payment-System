<?php
session_start();
include_once '../config/connection.config.php';
$id=$_GET['id'];
$select=mysqli_query($conn,"SELECT * FROM bill_detail WHERE userId='$id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Bill History</title>
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
        <h2>Bill History</h2>
        <table class="list">
        <tr>
            <th>Month</th>
            <th>Bill</th>
            <th>Paid</th>
        </tr>
        <?php
        if (mysqli_num_rows($select)) {
        while ($singleBill=mysqli_fetch_assoc($select)) { ?>
            <tr>
                <td><?php echo $singleBill['month']; ?></td>
                <td><?php echo $singleBill['bill']; ?></td>
                <td><?php
                if ($singleBill['isPaid']) {
                    echo 'Yes';
                } else {
                    echo 'No';
                }  ?></td>
            </tr>
    <?php    }
    }
    ?>
    </table>
    </div>
    
   
</body>
</html>