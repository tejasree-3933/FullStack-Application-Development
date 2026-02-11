<?php
session_start();          // START SESSION
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['email'] = $email;   // STORE USER
    header("Location: dashboard.php");
} else {
    header("Location: login.html?error=Invalid Email or Password");
}
?>
