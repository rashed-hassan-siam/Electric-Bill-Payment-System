<?php
session_start();
include_once 'config/connection.config.php';
if (!isset($_SESSION['userType']) || $_SESSION['userType']!=1) {
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
    <title>Reply</title>
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
        <h2>Reply</h2>
    <table class="list">
    
    <tr>
            <th>User</th>
            <th>Complaint</th>
            <th>Reply From Admin</th>
            <th>Operations</th>
        </tr>
        <?php
        $select=mysqli_query($conn, "SELECT * FROM complaints");
        if (mysqli_num_rows($select)) {
            while ($singleComplaint=mysqli_fetch_assoc($select)) {
                $cId=$singleComplaint['id'];
                $id=$singleComplaint['userId'];
                $select2=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
                if (mysqli_num_rows($select2)) {
                    $singleUser=mysqli_fetch_assoc($select2);
                } ?>
                <tr>
                <form action="includes/reply.include.php?id=<?php echo $cId; ?>" method="POST">
                    <td><?php echo $singleUser['username']; ?></td>
                    <td><?php echo $singleComplaint['complaint']; ?></td>
                    <td><textarea name="reply" id="reply" cols="40" rows="8"><?php echo $singleComplaint['reply']; ?></textarea></td>
                    <input type="hidden" name="cid" id="cid" value="<?php echo $cId; ?>">
                    <td><button class="submit">Reply</button></td>
                    </form>
                </tr>
        <?php    }
        }
        ?>
    
        
        
    </table>
    </div>

</body>
</html>