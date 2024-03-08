<?php
session_start();
include_once '../config/connection.config.php';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Edit User</title>
</head>

<body>
    <div class="nav">
    <a href="../index.php">

    <h2 class="home">Electricity</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billing</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System</h2>
</a>
        <nav>
            <?php if ($_SESSION['userType'] == 1) { ?>
                <a href="../consumers.php"><button class="navbtn">Consumers</button></a></br>
                <a href="../complaints.php"><button class="navbtn">Complaints</button></a></br>
            <?php } ?>
            <?php if ($_SESSION['userType'] == 2) { ?>
                <a href="../consumers.php"><button class="navbtn">Consumers</button></a></br>
            <?php } ?>
            <?php if ($_SESSION['userType'] == 3) { ?>
                <a href="bill-history.include.php?id=<?php echo $_SESSION['userId']; ?>"><button class="navbtn">Bill History</button></a></br>
                <a href="../payment.php"><button class="navbtn">Payment</button></a></br>
                <a href="../complaints.php"><button class="navbtn">Complaints</button></a></br>
            <?php } ?>
            <?php if ($_SESSION['userType'] == 4) { ?>
                <a href="../consumers.php"><button class="navbtn">Consumers</button></a></br>
                <a href="../transactions.php"><button class="navbtn">Transactions</button></a></br>
                <a href="../complaints.php"><button class="navbtn">Complaints</button></a></br>
            <?php } ?>
            <a href="logout.include.php"><button class="navbtn">Logout</button></a></br>
        </nav>
    </div>
    <div class="container">
        <h2>Edit User</h2>
        <?php
        $select = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
        if (mysqli_num_rows($select)) {
            $singleUser = mysqli_fetch_assoc($select);
            $username = $singleUser['username'];
            $password = $singleUser['password'];
        }
        $select2 = mysqli_query($conn, "SELECT * FROM meters WHERE userId='$id'");
        if (mysqli_num_rows($select2)) {
            $singleMeter = mysqli_fetch_assoc($select2);
            $meter = $singleMeter['meter'];
        }

        ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $newUser = $_POST['username'];
            $newPass = $_POST['password'];
            $newMeter = $_POST['meter'];
            $check = mysqli_query($conn, "SELECT * FROM meters WHERE meter='$newMeter' AND NOT userId='$id'");
            $check2=mysqli_query($conn,"SELECT * FROM users WHERE username='$newUser' AND NOT id='$id'");
            if (mysqli_num_rows($check)) {
                echo '<script>
            alert("Meter already in use by another consumer!");
            location.replace("edit-consumers.include.php?id=' . $id . '");
            </script>';
            } elseif (mysqli_num_rows($check2)) {
                echo '<script>
            alert("Username already in use by another user!");
            location.replace("edit-consumers.include.php?id=' . $id . '");
            </script>';
            } else {
                $update = mysqli_query($conn, "UPDATE users SET username='$newUser',password='$newPass' WHERE id='$id'");
                if ($update) {
                    $update2 = mysqli_query($conn, "UPDATE meters SET meter='$newMeter' WHERE userId='$id'");
                    if ($update2) {
			echo '<script>location.replace("../consumers.php");</script>';
                    }
                }
            }
        }
        ?>
        <form action="#" method="POST">
            <table class="form">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Meter</th>
                    <th>Operations</th>
                </tr>
                <tr>
                    <td><input type="text" name="username" value="<?php echo $username; ?>" required></td>
                    <td><input type="password" name="password" value="<?php echo $password; ?>" required></td>
                    <td><input type="text" name="meter" value="<?php echo $meter; ?>" required></td>
                    <td><button class="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>