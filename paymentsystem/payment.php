<?php
include "db.php";

$user_id = 1;      // User Account
$merchant_id = 2;  // Merchant Account
$amount = $_POST['amount'];

mysqli_begin_transaction($conn);

try {

    // Check User Balance
    $check = mysqli_query($conn, 
        "SELECT balance FROM accounts WHERE account_id = $user_id");
    $row = mysqli_fetch_assoc($check);
    $balance = $row['balance'];

    if ($balance < $amount) {
        throw new Exception("Insufficient Balance");
    }

    // Deduct from user
    mysqli_query($conn, 
        "UPDATE accounts 
         SET balance = balance - $amount 
         WHERE account_id = $user_id");

    // Add to merchant
    mysqli_query($conn, 
        "UPDATE accounts 
         SET balance = balance + $amount 
         WHERE account_id = $merchant_id");

    mysqli_commit($conn);

    echo "<h2 style='color:green;'>Payment Successful!</h2>";

} catch (Exception $e) {

    mysqli_rollback($conn);

    echo "<h2 style='color:red;'>Payment Failed: " . $e->getMessage() . "</h2>";
}
?>
