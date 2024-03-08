<?php
session_start();
include_once 'config/connection.config.php';
if (!isset($_SESSION['userType']) || $_SESSION['userType']!=4) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Transactions</title>
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
        <h2>Transactions</h2>
        <table class="list">
        <tr>
            <th>Transaction ID</th>
            <th>Username</th>
            <th>Month</th>
            <th>Bill</th>
        </tr>
        <?php
        $select=mysqli_query($conn, "SELECT * FROM transactions");
        if (mysqli_num_rows($select)) {
            while ($singleTrx=mysqli_fetch_assoc($select)) {
                $id=substr(md5($singleTrx['id']), 0, 10);
                $userId=$singleTrx['userId'];
                $month=$singleTrx['month'];
                $bill=$singleTrx['bill'];
                $select2=mysqli_query($conn, "SELECT * FROM users WHERE id='$userId'");
                if (mysqli_num_rows($select2)) {
                    $singleUser=mysqli_fetch_assoc($select2);
                    $username=$singleUser['username'];
                } ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $month; ?></td>
                    <td><?php echo $bill; ?></td>
                </tr>
        <?php    }
        }
        ?>
    </table>
    <?php
    $sum=mysqli_query($conn, "SELECT SUM(bill) AS total FROM transactions");
    if (mysqli_num_rows($sum)) {
        $total=mysqli_fetch_assoc($sum); ?>
        <h2>Total earnings BDT <?php echo round($total['total'], 2); ?></h2>
    <?php }
    ?>
    </div>
    
</body>
</html>