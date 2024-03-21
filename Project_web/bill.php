<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>List Order</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        h2 {
            color: #9099ff;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #9099ff;
            color: #fff;
        }

        tbody tr:hover {
            background-color: #002d5a;
            color:#fff
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 10px;
            text-decoration: none;
            margin: 0 5px;
            border: 1px solid #3498db;
            border-radius: 3px;
            color: #3498db;
        }

        .pagination a:hover {
            background-color: #002d5a;
            color: #fff;
        }

        .bill-link{
            text-decoration: none;
            color: #fff;
            background-color: #9099ff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .bill-link:hover{
            color:#000;
            background-color: #fff;
        }
    </style>
</head>

<body>
<?php
include('ketnoi.php');

// Truy vấn lấy danh sách hóa đơn và gộp theo ngaydat và tinhtrang
$sql = "SELECT MIN(ID_KH) AS ID_KH, TEN_KH, SDT_KH, NGAYDAT, TINHTRANG
        FROM ct_donhang
        GROUP BY NGAYDAT, TINHTRANG";

$ketqua = mysqli_query($ketnoi, $sql);
?>
    <h2>Order List</h2>
    <table>
        <thead>
            <tr>
                <th>ID-Customer</th>
                <th>Customer-Name</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Status</th>
                <th>Detail-Order</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($ketqua)) : ?>
                <tr>
                    <td><?php echo $row['ID_KH']; ?></td>
                    <td><?php echo $row['TEN_KH']; ?></td>
                    <td><?php echo $row['SDT_KH']; ?></td>
                    <td><?php echo $row['NGAYDAT']; ?></td>
                    <td><?php echo $row['TINHTRANG']; ?></td>
                    <td ><a class="bill-link" href="hoadon.php?ID_KH=<?php echo $row['ID_KH']; ?>&NGAYDAT=<?php echo $row['NGAYDAT']; ?>&TINHTRANG=<?php echo $row['TINHTRANG']; ?>">Bill</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>
