<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/detail_order.css">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Detail Order</title>
</head>

<body>
    <?php
    include('ketnoi.php');

    // Kiểm tra xem có tham số ID_DH được truyền từ URL không
    if (isset($_GET['ID_DH'])) {
        // Lấy giá trị ID_DH từ URL
        $id_dh = $_GET['ID_DH'];

        // Truy vấn dữ liệu từ bảng ct_donhang và donhang
        $query = "SELECT ct.*, dh.* FROM ct_donhang ct JOIN donhang dh ON ct.ID_DH = dh.ID_DH WHERE ct.ID_DH = '$id_dh'";
        $result = mysqli_query($ketnoi, $query);

        // Kiểm tra xem có dữ liệu hay không
        if ($result && mysqli_num_rows($result) > 0) {
            // Hiển thị thông tin về đơn hàng (chỉ hiển thị 1 lần)
            $row = mysqli_fetch_assoc($result);
            $id_ct = $row['ID_CT'];
            $id_dh = $row['ID_DH'];
            $id_kh = $row['ID_KH'];
            $date = $row['NGAYDAT'];
            $ten_kh = $row['TEN_KH'];
            $diachi = $row['DIACHI'];
            $sdt_kh = $row['SDT_KH'];
            $tinhtrang = $row['TINHTRANG'];

            // Hiển thị thông tin theo ý muốn
            echo "<div class='cover'>";
            echo "<div class='cover-id'>";
            echo "<p class='cover-id-text'>ID_DH.#$id_dh</p>";
            echo "<p class='cover-id-text'>ID_KH.#$id_kh</p>";
            echo "<p class='cover-id-text'>Date. $date</p>";
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

            // Hiển thị thông tin về từng sản phẩm
            mysqli_data_seek($result, 0); // Reset the result pointer
            while ($row = mysqli_fetch_assoc($result)) {
                $id_sp = $row['ID_SP'];
                $ten_sp = $row['TEN_SP'];
                $soluong = $row['SOLUONG'];
                $gia = $row['GIA'];
                $thanhtoan = $row['THANHTOAN'];

                echo "<tr>";
                echo "<td>$id_sp</td>";
                echo "<td>$ten_sp</td>";
                echo "<td>$soluong</td>";
                echo "<td>$$gia</td>";
                echo "</tr>";
            }

            // Thêm trường THANHTOAN vào hàng
            echo "<tr class='cover-thanhtoan'>";
            echo "<td colspan='3'><strong>Total:$thanhtoan</strong></td>";
            echo "</tr>";

            echo "</table>";
            echo "</div>";

            // Hiển thị thông tin về địa chỉ và giao hàng
            echo "<div class='cover-address-delivery'>";
            echo "<div class='cover-id_address'>";
            echo "<p class='cover-id_address-customer'>Customer. $ten_kh</p>";
            echo "<p class='cover-id_address-customer'>Address: $diachi</p>";
            echo "<p class='cover-id_address-customer'>Phone: $sdt_kh</p>";
            echo "</div>";

            echo "<div class='cover-id-delivery'>";
            echo "<i class='fa-solid fa-truck-fast'></i><p>$tinhtrang</p>";
            echo "</div>";
            echo "</div>";

            echo "</div>";
        } else {
            echo "Không tìm thấy dữ liệu đơn hàng có ID_DH = $id_dh";
        }
    } else {
        echo "Thiếu tham số ID_DH trong URL";
    }
    ?>
</body>

</html>
