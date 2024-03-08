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
    <title>New Applications</title>
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
        <h2>New applicants</h2>
    <table class="form">
        <tr>
            <th>Username</th>
            <th>password</th>
            <th>Meter</th>
            <th>Operations</th>
        </tr>
        <?php $select=mysqli_query($conn,"SELECT * FROM new_applications");
        if(mysqli_num_rows($select)){
            while ($singleApplication=mysqli_fetch_assoc($select)) { ?>
		<form action="includes/add-applicants.include.php" method="POST">
                <tr>
                    <td><input type="text" name="username" value="<?php echo $singleApplication['username']; ?>" readonly style="background-color: #bdc3c7;"></td>
                    <td><input type="password" name="password" value="<?php echo $singleApplication['password']; ?>" readonly style="background-color: #bdc3c7;"></td>
                    <td><input type="text" name="meter" placeholder="Enter meter number" required></td>
                    <td><button class="submit">Add</button></td>
                </tr>
		</form>
                <?php    }
        } ?>
    </table>
    </div>
    
    
</body>
</html>