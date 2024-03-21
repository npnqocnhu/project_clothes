<?php
// Kết nối đến database
include('ketnoi.php');

// Kiểm tra xem có ID_SP được chọn không
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Truy vấn lấy thông tin sản phẩm
    $query_product = "SELECT * FROM sanpham WHERE ID_SP = $product_id";
    $result_product = mysqli_query($ketnoi, $query_product) or die(mysqli_error($ketnoi));
    $product = mysqli_fetch_assoc($result_product);

    // Truy vấn lấy thông tin chi tiết đơn hàng cho sản phẩm
    $query_details = "SELECT * FROM ct_donhang WHERE ID_SP = $product_id";
    $result_details = mysqli_query($ketnoi, $query_details) or die(mysqli_error($ketnoi));
} else {
    // Nếu không có ID_SP được truyền, lấy sản phẩm đầu tiên
    $query_first_product = "SELECT * FROM sanpham ORDER BY ID_SP ASC LIMIT 1";
    $result_first_product = mysqli_query($ketnoi, $query_first_product) or die(mysqli_error($ketnoi));

    // Kiểm tra xem có sản phẩm đầu tiên hay không
    if ($result_first_product && mysqli_num_rows($result_first_product) > 0) {
        $product = mysqli_fetch_assoc($result_first_product);
        $product_id = $product['ID_SP'];

        // Truy vấn lấy thông tin chi tiết đơn hàng cho sản phẩm
        $query_details = "SELECT * FROM ct_donhang WHERE ID_SP = $product_id";
        $result_details = mysqli_query($ketnoi, $query_details) or die(mysqli_error($ketnoi));
    } else {
        // Nếu không có sản phẩm nào, có thể hiển thị thông báo hoặc xử lý theo ý muốn
        echo "Không có thông tin sản phẩm.";
        exit; // Thoát khỏi script để ngăn tiếp tục thực thi HTML
    }
}

// Lấy ID của sản phẩm trước đó
$previous_id = $product_id - 1;
$query_previous = "SELECT ID_SP FROM sanpham WHERE ID_SP = $previous_id";
$result_previous = mysqli_query($ketnoi, $query_previous) or die(mysqli_error($ketnoi));

// Lấy ID của sản phẩm tiếp theo
$next_id = $product_id + 1;
$query_next = "SELECT ID_SP FROM sanpham WHERE ID_SP = $next_id";
$result_next = mysqli_query($ketnoi, $query_next) or die(mysqli_error($ketnoi));

// Đóng kết nối
mysqli_close($ketnoi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Chi tiết hóa đơn - <?php echo $product['TEN_SP']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .home-link {
            display: inline-block;
            padding: 15px 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 8px;
            background-color: #9099ff;
            transition: background-color 0.3s, color 0.3s;
        }

        .home-link i {
            margin-right: 10px;
        }

        .home-link:hover {
            background-color: #002d5a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .navigation a {
            display: inline-block;
            padding: 15px 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 8px;
            background-color: #0066cc;
            transition: background-color 0.3s, color 0.3s;
            
        }

        .navigation a i {
            margin-right: 10px;
        }

        .navigation a:hover {
            background-color: #004080;
        }


        .navigation span {
            margin: 0 10px;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #eee;
            color: #777;
        }

        .negative-link{
            background-color: #9099ff;
            padding: 5px 20px;
            border-radius: 5px;
            color: #fff;
        }

        .negative-cover{
            margin-top: 20px;
            text-align: center;
        }

        .nagative-left{
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <a class="home-link" href="mainadmin.php"><i class="fa-solid fa-house"></i>Home</a>
    <h2>Manage invoices by product</h2>

    <!-- Hiển thị thông tin sản phẩm -->
    <p>ID_SP: <?php echo $product['ID_SP']; ?></p>
    <p>Name-Product: <?php echo $product['TEN_SP']; ?></p>

    <!-- Hiển thị danh sách chi tiết đơn hàng -->
    <table>
        <thead>
            <tr>
                <th>ID_DH</th>
                <th>Number</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Hiển thị danh sách chi tiết đơn hàng
                while ($detail = mysqli_fetch_assoc($result_details)) {
                    echo '<tr>';
                    echo '<td>' . $detail['ID_DH'] . '</td>';
                    echo '<td>' . $detail['SOLUONG'] . '</td>';
                    echo '<td>' . $detail['GIA'] . '</td>';
                    echo '<td>' . $detail['THANHTOAN'] . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>

    <!-- Các nút điều hướng -->
    <div class="negative-cover">
        <?php
            // Hiển thị nút chuyển đến sản phẩm trước đó
            if (mysqli_num_rows($result_previous) > 0) {
                echo '<a class="negative-link nagative-left" href="detailtheosp.php?product_id=' . $previous_id . '"><i class="fa-solid fa-caret-left"></i></a>';
            }

            // Hiển thị nút chuyển đến sản phẩm tiếp theo
            if (mysqli_num_rows($result_next) > 0) {
                echo '<a class="negative-link" href="detailtheosp.php?product_id=' . $next_id . '"><i class="fa-solid fa-caret-right"></i></a>';
            }
        ?>
    </div>
</body>
</html>
