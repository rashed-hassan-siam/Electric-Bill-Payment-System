<?php
session_start();
include_once '../config/connection.config.php';
$id=$_GET['id'];
$select=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
if (mysqli_num_rows($select)) {
    $single=mysqli_fetch_assoc($select);
    $username=$single['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Calculate Bill</title>
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
        <h2>Bill Calculation</h2>
        <form action="bill-result.include.php?id=<?php echo $id; ?>" method="POST">
        <table class="form">
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" value="<?php echo $username; ?>" readonly style="background-color: #bdc3c7;"></td>
            </tr>
            <tr>
                <td><label for="month">Month</label></td>
                <td style="text-align: left;">
                <input type="radio" name="month" id="January" value="January" style="width: 15px;height: 15px;">
                <label for="January">January</label></br>
        <input type="radio" name="month" id="February" value="February" style="width: 15px;height: 15px;">
        <label for="February">February</label></br>
        <input type="radio" name="month" id="March" value="March" style="width: 15px;height: 15px;">
        <label for="March">March</label></br>
        <input type="radio" name="month" id="April" value="April" style="width: 15px;height: 15px;">
        <label for="April">April</label></br>
        <input type="radio" name="month" id="May" value="May" style="width: 15px;height: 15px;">
        <label for="May">May</label></br>
        <input type="radio" name="month" id="June" value="June" style="width: 15px;height: 15px;">
        <label for="June">June</label></br>
        <input type="radio" name="month" id="July" value="July" style="width: 15px;height: 15px;">
        <label for="July">July</label></br>
        <input type="radio" name="month" id="August" value="August" style="width: 15px;height: 15px;">
        <label for="August">August</label></br>
        <input type="radio" name="month" id="September" value="September" style="width: 15px;height: 15px;">
        <label for="September">September</label></br>
        <input type="radio" name="month" id="October" value="October" style="width: 15px;height: 15px;">
        <label for="October">October</label></br>
        <input type="radio" name="month" id="November" value="November" style="width: 15px;height: 15px;">
        <label for="November">November</label></br>
        <input type="radio" name="month" id="December" value="December" style="width: 15px;height: 15px;">
        <label for="December">December</label></br>
                </td>
            </tr>
            <tr>
                <td><label for="usage">Monthly Usage</label></td>
                <td><input type="number" name="usage" id="usage" min="0" required></td>
            </tr>
        </table>
        <button class="submit">Submit</button>
    </form>
    </div>
    
</body>
</html>