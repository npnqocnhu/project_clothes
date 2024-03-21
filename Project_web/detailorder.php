<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="css.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .title {
            text-align: center;
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .actions a {
            display: block;
            text-decoration: none;
            padding: 8px;
            text-align: center;
            border-radius: 5px;
            margin: 2px;
            font-weight: bold;
        }

        .actions a.edit {
            background-color: #4caf50;
            color: #fff;
        }

        .actions a.delete {
            background-color: #f44336;
            color: #fff;
        }

        .actions a.view {
            background-color: #2196f3;
            color: #fff;
        }
    </style>
</head>

<body>
<?php
include('ketnoi.php');
$sql = "SELECT* FROM ct_donhang";
$ketqua = mysqli_query($ketnoi, $sql);
?>
    <div class="container">
        <h1 class="title"><center>ORDER DETAILS</center></h1>
        <table>
            <thead>
                <tr>
                    <th>Order Detail ID</th>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Product ID</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <!-- <th class="actions" colspan="3">Actions</th> -->
                </tr>
            </thead>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($ketqua)) {
                echo "<tr>";
                echo "<td>" . $row['ID_CT'] . "</td>";
                echo "<td>" . $row['ID_DH'] . "</td>";
                echo "<td>" . $row['ID_KH'] . "</td>";
                echo "<td>" . $row['ID_SP'] . "</td>";
                echo "<td>" . $row['TEN_KH'] . "</td>";
                echo "<td>" . $row['DIACHI'] . "</td>";
                echo "<td>" . $row['SDT_KH'] . "</td>";
                echo "<td>" . $row['TEN_SP'] . "</td>";
                echo "<td>" . $row['SOLUONG'] . "</td>";
                echo "<td>" . $row['GIA'] . "</td>";
                echo "<td>" . $row['NGAYDAT'] . "</td>";
                echo "<td>" . $row['THANHTOAN'] . "</td>";
                echo "<td>" . $row['TINHTRANG'] . "</td>";
                // echo '<td class="actions"><a href="#" class="view">View</a></td>';
                echo "</tr>";
                $i++;
            }
            ?>
        </table>
    </div>
</body>

</html>
