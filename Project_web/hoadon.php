<?php
include('ketnoi.php');

if (isset($_GET['ID_KH'], $_GET['NGAYDAT'], $_GET['TINHTRANG'])) {
    $ID_KH = $_GET['ID_KH'];
    $NGAYDAT = $_GET['NGAYDAT'];
    $TINHTRANG = $_GET['TINHTRANG'];

    $sql_khachhang = "SELECT * FROM khachhang WHERE ID_KH = '$ID_KH'";
    $result_khachhang = mysqli_query($ketnoi, $sql_khachhang);

    if ($result_khachhang && $row_khachhang = mysqli_fetch_assoc($result_khachhang)) {
        $ten_khachhang = $row_khachhang['TEN_KH'];
        $sdt_khachhang = $row_khachhang['SDT_KH'];
    }

    $sql_donhang = "SELECT TEN_SP, SUM(SOLUONG) AS TONG_SOLUONG, GIA, SUM(THANHTOAN) AS TONG_THANHTOAN
                    FROM ct_donhang
                    WHERE ID_KH = '$ID_KH' AND NGAYDAT = '$NGAYDAT' AND TINHTRANG = '$TINHTRANG'
                    GROUP BY TEN_SP, GIA";
    $result_donhang = mysqli_query($ketnoi, $sql_donhang);

    if (!$result_donhang) {
        die("Lỗi trong truy vấn SQL: " . mysqli_error($ketnoi));
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        header {
            margin-bottom: 20px;
        }

        h2 {
            color: #3498db;
        }

        p {
            margin-bottom: 20px;
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
            color: #fff;
        }

        .total-amount {
            float: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .print-button {
            background-color: #9099ff;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .print-button:hover {
            background-color: #002d5a;
        }
    </style>
</head>

<body>

    <header>
        <h2>Order Details - Customer: <?php echo $ten_khachhang; ?></h2>
        <p>Phone: <?php echo $sdt_khachhang; ?></p>
        <p>Order Date: <?php echo $NGAYDAT; ?></p>
    </header>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tong_thanhtien = 0;
            $stt = 1; // Biến tăng để đánh số thứ tự
            while ($row_donhang = mysqli_fetch_assoc($result_donhang)) :
                $tong_thanhtien += $row_donhang['TONG_THANHTOAN'];
            ?>
                <tr>
                    <td><?php echo $row_donhang['TEN_SP']; ?></td>
                    <td><?php echo $row_donhang['TONG_SOLUONG']; ?></td>
                    <td><?php echo $row_donhang['GIA']; ?></td>
                    <td><?php echo $row_donhang['TONG_THANHTOAN']; ?></td>
                </tr>
            <?php
                $stt++;
            endwhile;
            ?>
        </tbody>
    </table>

    <p class="total-amount">Total Amount: $<?php echo $tong_thanhtien; ?></p>
    <button class="print-button" onclick="printInvoice()">Print Invoice</button>

    <script>
        function printInvoice() {
            window.print();
        }
    </script>

<?php
} else {
    echo "<p>Không có thông tin khách hàng được chọn.</p>";
}
?>

</body>

</html>
