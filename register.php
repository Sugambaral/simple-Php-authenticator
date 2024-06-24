<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        // header("Location:login.php");
        echo "User registered successfully";
        echo '<html>';
        echo '<head>';
        echo '</head>';
        echo '<body>';
        echo '<p>Click <a href="login.php">here</a> to go to the login page.</p>';
        echo '</body>';
        echo '</html>';

        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form action="register.php" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Register">
    <p>Already have an account?</p> <a href="login.php">Login here</a>
</form>
