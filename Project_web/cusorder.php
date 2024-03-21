<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/detail_order.css">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Your Orders</title>
</head>

<body>
    <?php
    include('ketnoi.php');
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['ID_KH'])) {
        header("Location: login.php");
        exit();
    }

    $khachhang_id = $_SESSION['ID_KH'];

    // Truy vấn dữ liệu từ bảng ct_donhang và donhang
    $query = "SELECT dh.ID_DH, dh.NGAYDAT, dh.TINHTRANG, dh.THANHTOAN,
                     dh.TEN_KH, dh.DIACHI, dh.SDT_KH,
                     GROUP_CONCAT(ct.TEN_SP SEPARATOR '; ') AS TEN_SP,
                     GROUP_CONCAT(ct.SOLUONG SEPARATOR '; ') AS SOLUONG,
                     GROUP_CONCAT(ct.GIA SEPARATOR '; ') AS GIA
              FROM ct_donhang ct
              JOIN donhang dh ON ct.ID_DH = dh.ID_DH
              WHERE ct.ID_KH = '$khachhang_id'
              GROUP BY dh.ID_DH
              ORDER BY dh.NGAYDAT DESC"; // Order by date, you can change this based on your preference
    $result = mysqli_query($ketnoi, $query);

    // Kiểm tra xem có dữ liệu hay không
    if ($result && mysqli_num_rows($result) > 0) {
        // Hiển thị thông tin về các đơn hàng
        while ($row = mysqli_fetch_assoc($result)) {
            $id_dh = $row['ID_DH'];
            $date = $row['NGAYDAT'];
            $tinhtrang = $row['TINHTRANG'];

            echo "<div class='cover'>";
            echo "<div class='cover-id'>";
            echo "<p class='cover-id-text'>ID_DH.#$id_dh</p>";
            echo "<p class='cover-id-text'>Date. $date</p>";
            echo "</div>";

            // Hiển thị thông tin chung về đơn hàng (chỉ hiển thị 1 lần cho mỗi đơn hàng)
            echo "<div class='cover-address-delivery'>";
            echo "<div class='cover-id_address'>";
            echo "<p class='cover-id_address-customer'>Customer. {$row['TEN_KH']}</p>";
            echo "<p class='cover-id_address-customer'>Address: {$row['DIACHI']}</p>";
            echo "<p class='cover-id_address-customer'>Phone: {$row['SDT_KH']}</p>";
            echo "</div>";

            echo "<div class='cover-id-delivery'>";
            echo "<i class='fa-solid fa-truck-fast'></i><p>$tinhtrang</p>";
            echo "</div>";
            echo "</div>";

            // Hiển thị thông tin về sản phẩm
            echo "<div class='cover-id_product'>";
            echo "<table class='cover-id_product-table'>";
            echo "<tr>";
            echo "<th>ID_Product</th>";
            echo "<th>Product</th>";
            echo "<th>Quantity</th>";
            echo "<th>Price</th>";
            echo "</tr>";

            // Hiển thị thông tin về từng sản phẩm trong đơn hàng
            echo "<tr>";
            echo "<td>{$row['ID_SP']}</td>";
            echo "<td>{$row['TEN_SP']}</td>";
            echo "<td>{$row['SOLUONG']}</td>";
            echo "<td>{$row['GIA']}</td>";
            echo "</tr>";

            // Thêm trường THANHTOAN vào hàng
            echo "<tr class='cover-thanhtoan'>";
            echo "<td colspan='3'><strong>Total:{$row['THANHTOAN']}</strong></td>";
            echo "</tr>";

            echo "</table>";
            echo "</div>";

            echo "</div>";
        }
    } else {
        echo "Không có đơn hàng nào.";
    }
    ?>
</body>

</html>
