<?php
include "db.php";

$query = "
SELECT c.name, p.product_name, o.quantity, 
       (p.price * o.quantity) AS total_amount,
       o.order_date
FROM orders o
JOIN customers c ON o.customer_id = c.customer_id
JOIN products p ON o.product_id = p.product_id
ORDER BY o.order_date DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Dashboard</title>
<style>
body {
    font-family: Arial;
    background: #f4f6f8;
    padding: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}
th, td {
    border: 1px solid #333;
    padding: 8px;
    text-align: center;
}
th {
    background: #007BFF;
    color: white;
}
h2 {
    text-align: center;
}
</style>
</head>
<body>

<h2>Customer Order History</h2>

<table>
<tr>
<th>Customer</th>
<th>Product</th>
<th>Quantity</th>
<th>Total Amount</th>
<th>Order Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['product_name'] ?></td>
<td><?= $row['quantity'] ?></td>
<td><?= $row['total_amount'] ?></td>
<td><?= $row['order_date'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
