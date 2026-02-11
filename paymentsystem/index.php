<!DOCTYPE html>
<html>
<head>
    <title>Payment Simulation</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 100px;
        }
        .box {
            background: white;
            padding: 30px;
            width: 300px;
            margin: auto;
            box-shadow: 0px 0px 10px gray;
            border-radius: 10px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Online Payment</h2>

    <form action="payment.php" method="POST">
        <label>Enter Amount:</label><br>
        <input type="number" name="amount" required><br>
        <button type="submit">Pay Now</button>
    </form>
</div>

</body>
</html>
