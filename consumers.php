<?php
session_start();
include_once 'config/connection.config.php';
if(!isset($_SESSION['userId']) || $_SESSION['userId']==NULL || $_SESSION['userType']==3){
    header('Location: index.php');
}
$type=$_SESSION['userType'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Consumers</title>
</head>
<body>
    <div class="nav">
    <a href="index.php">

    <h2 class="home">Electricity</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System</h2>
        </a>
        <nav>
            <?php if($type==1){ ?>
    
                <a href="applicants.php"><button class="navbtn">New Applications</button></a></br>
        <?php    } ?>
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
        <h2>Consumers</h2>
    <table class="form">
        <tr>
            <th>Username</th>
            <th>Meter</th>
            <th>Bill History</th>
            <?php if ($_SESSION['userType']!=4) { ?>
                <th colspan="2">Operations</th>
            <?php } ?>
        </tr>
        <?php $select=mysqli_query($conn, "SELECT * FROM users WHERE type='3'");
        if(mysqli_num_rows($select)){
            while ($singleConsumer=mysqli_fetch_assoc($select)) { 
                $cId=$singleConsumer['id']; ?>
                <tr>
                    <td><?php echo $singleConsumer['username'] ?></td>
                    <?php $select2=mysqli_query($conn, "SELECT * FROM meters WHERE userId='$cId'");
                    if(mysqli_num_rows($select2)){
                        $meter=mysqli_fetch_assoc($select2);
                    } ?>
                    <td><?php echo $meter['meter']; ?></td>
                    <td><a href="includes/bill-history.include.php?id=<?php echo $cId; ?>"><button class="submit">Bill History</button></a></td>
                    <?php if ($type==1) { ?>
                        <td><a href="includes/edit-consumers.include.php?id=<?php echo $cId; ?>"><button class="submit">Edit</button></a></td>
                        <td><a href="includes/delete-consumers.include.php?id=<?php echo $cId; ?>"><button class="submit">Delete</button></a></td>
                    <?php    } ?>
                    <?php if ($type==2) { ?>
                        <td><a href="includes/bill-calculate.include.php?id=<?php echo $cId; ?>"><button class="submit">Calculate Bill</button></a></td>
                    <?php    } ?>
                </tr>
        <?php    }
        } ?>
    </table>
    </div>
    

</body>
</html>