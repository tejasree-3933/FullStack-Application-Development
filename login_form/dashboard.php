<?php
session_start();            // Start session
include "db.php";           // Database connection

$email = $_POST['email'];
$password = $_POST['password'];

/* Step 1: Get user by email */
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

/* Step 2: Check if user exists */
if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    /* Step 3: Verify hashed password */
    if (password_verify($password, $row['password'])) {

        // Login success
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();

    } else {
        // Wrong password
        header("Location: login.html?error=Invalid Password");
        exit();
    }

} else {
    // Email not found
    header("Location: login.html?error=User not found");
    exit();
}
?>
