<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>
<h1>Welcome, <?php echo $username; ?></h1>
<a href="change_password.php">Change Password</a>
<a href="logout.php">Logout</a>
