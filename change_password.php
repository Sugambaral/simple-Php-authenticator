<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

require_once 'config.php';

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password='$new_password' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Congratulation!!! Password changed successfully";
        echo '<html>';
        echo '<head>';
        echo '</head>';
        echo '<body>';
        echo '<p>Click <a href="dashboard.php">here</a> to go to the dashboard page.</p>';
        echo '</body>';
        echo '</html>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form action="change_password.php" method="post">
    New Password: <input type="password" name="new_password" required><br>
    <input type="submit" value="Change Password">
</form>
