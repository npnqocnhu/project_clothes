<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        li {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            transition: transform 0.3s;
        }

        li:hover{
            transform: translate(0.8);
        }

        strong {
            color: #e44d26;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .order-info {
            background-color: #3498db;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .order-info input {
            background-color: #fff;
            color: #333;
            border: 1px solid #ddd;
        }

        /* Thêm điều chỉnh cho tiêu đề thông tin nhận hàng */
        .order-info h3 {
            margin: 0 0 10px;
            color: #fff;
        }

        /* Thêm định dạng cho ngày đặt hàng */
        .order-date {
            font-size: 14px;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h2>Your Orders</h2>

    <?php
    include("ketnoi.php");
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['ID_KH'])) {
        header("Location: login.php");
        exit();
    }

    $khachhang_id = $_SESSION['ID_KH'];

    $sql = "SELECT ID_DH, TEN_SP, SOLUONG, GIA, THANHTOAN, TINHTRANG, DIACHI, SDT_KH, NGAYDAT FROM ct_donhang WHERE ID_KH = ?";
    $stmt = $ketnoi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $khachhang_id);
        $stmt->execute();
        $ketqua = $stmt->get_result();

        if ($ketqua !== null) {
            // Display orders
            if ($ketqua->num_rows > 0) {
                echo "<ul>";
                while ($row = $ketqua->fetch_assoc()) {
                    echo "<li>";
                    
                    // Thêm phần thông tin nhận hàng ở đầu đơn hàng
                    echo "<div class='order-info'>";
                    echo "<h3>Shipping Information</h3>";
                    echo "<input type='text' value='Address: " . $row['DIACHI'] . "' readonly>";
                    echo "<input type='text' value='Phone: " . $row['SDT_KH'] . "' readonly>";
                    echo "</div>";
                    
                    // Hiển thị thông tin sản phẩm
                    echo "<strong>Product Name:</strong> " . $row['TEN_SP'] . "<br>";
                    echo "<input type='text' value='Quantity: " . $row['SOLUONG'] . "' readonly>";
                    echo "<input type='text' value='Price: " . $row['GIA'] . "' readonly>";
                    echo "<input type='text' value='Payment Method: " . $row['THANHTOAN'] . "' readonly>";
                    echo "<input type='text' value='Status: " . $row['TINHTRANG'] . "' readonly>";
                    
                    // Hiển thị ngày đặt hàng
                    echo "<div class='order-date'>Order Date: " . $row['NGAYDAT'] . "</div>";
                    
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "You don't have any orders yet.";
            }

            // Close the result set
            $ketqua->close();
        } else {
            echo "Error retrieving orders.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing SQL statement.";
    }

    // Close the database connection
    $ketnoi->close();
    ?>

</body>
</html>
