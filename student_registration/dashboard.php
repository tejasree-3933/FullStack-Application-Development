<?php
include "db.php";

/* ---------- Sorting ---------- */
$sort = "";
if (isset($_GET['sort'])) {
    if ($_GET['sort'] == "name") {
        $sort = "ORDER BY name ASC";
    } elseif ($_GET['sort'] == "dob") {
        $sort = "ORDER BY dob ASC";
    }
}

/* ---------- Filtering ---------- */
$filter = "";
if (isset($_GET['department']) && $_GET['department'] != "") {
    $dept = $_GET['department'];
    $filter = "WHERE department='$dept'";
}

/* ---------- Main Query ---------- */
$sql = "SELECT * FROM students $filter $sort";
$result = mysqli_query($conn, $sql);

/* ---------- Count Per Department ---------- */
$countQuery = "SELECT department, COUNT(*) AS total FROM students GROUP BY department";
$countResult = mysqli_query($conn, $countQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
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
        .box {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
        }
        select, button {
            padding: 6px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<h2>📊 Student Data Dashboard</h2>
<div class="box">
    <form method="get">
        <label>Sort By:</label>
        <select name="sort">
            <option value="">None</option>
            <option value="name">Name</option>
            <option value="dob">Date of Birth</option>
        </select>

        <label>Department:</label>
        <select name="department">
            <option value="">All</option>
            <option>CSE</option>
            <option>ECE</option>
            <option>EEE</option>
            <option>MECH</option>
        </select>

        <button type="submit">Apply</button>
    </form>
</div>
<div class="box">
<h3>Student Records</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>DOB</th>
        <th>Department</th>
        <th>Phone</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['dob'] ?></td>
        <td><?= $row['department'] ?></td>
        <td><?= $row['phone'] ?></td>
    </tr>
    <?php } ?>

</table>
</div>
<div class="box">
<h3>👥 Student Count Per Department</h3>

<table>
    <tr>
        <th>Department</th>
        <th>Total Students</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($countResult)) { ?>
    <tr>
        <td><?= $row['department'] ?></td>
        <td><?= $row['total'] ?></td>
    </tr>
    <?php } ?>

</table>
</div>

</body>
</html>
