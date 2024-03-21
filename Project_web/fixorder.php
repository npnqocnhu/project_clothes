<?php
include('ketnoi.php');

// Kiểm tra xem có tham số ID_DH từ URL không
if (isset($_GET['ID_DH'])) {
    $ID_DH = $_GET['ID_DH'];

    // Truy vấn CSDL để lấy thông tin đơn hàng cần sửa
    $query_select_donhang = "SELECT * FROM donhang WHERE ID_DH = '$ID_DH'";
    $query_select_donhang = "SELECT * FROM ct_donhang WHERE ID_DH = '$ID_DH'";
    $ketqua_select_donhang = mysqli_query($ketnoi, $query_select_donhang);

    if ($ketqua_select_donhang->num_rows > 0) {
        $row_donhang = $ketqua_select_donhang->fetch_assoc();

        // Gán giá trị của các trường vào các biến
        $ID_KH = $row_donhang["ID_KH"];
        $NGAYDAT = $row_donhang["NGAYDAT"];
        $THANHTOAN = $row_donhang["THANHTOAN"];
        $TINHTRANG = $row_donhang["TINHTRANG"];
        $DIACHI = $row_donhang["DIACHI"];
        $SDT_KH = $row_donhang["SDT_KH"];
        $TEN_KH = $row_donhang["TEN_KH"];
    } else {
        echo "Không tìm thấy thông tin đơn hàng.";
        exit;
    }
} else {
    echo "Thiếu tham số ID_DH.";
    exit;
}

// Xử lý khi nút Save được ấn
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_order'])) {
    // Lấy dữ liệu từ form
    $NGAYDAT = $_POST["NGAYDAT"];
    $THANHTOAN = $_POST["THANHTOAN"];
    $TINHTRANG = $_POST["TINHTRANG"];

    // Thêm các trường mới vào
    $DIACHI = $_POST["DIACHI"];
    $SDT_KH = $_POST["SDT_KH"];
    $TEN_KH = $_POST["TEN_KH"];

    // Cập nhật thông tin đơn hàng trong bảng donhang
    $query_update_donhang = "UPDATE donhang SET NGAYDAT='$NGAYDAT', THANHTOAN='$THANHTOAN', TINHTRANG='$TINHTRANG' WHERE ID_DH='$ID_DH'";

    if (mysqli_query($ketnoi, $query_update_donhang)) {
        // Cập nhật thông tin đơn hàng trong bảng ct_donhang
        $query_update_ct_donhang = "UPDATE ct_donhang SET NGAYDAT='$NGAYDAT', THANHTOAN='$THANHTOAN', TINHTRANG='$TINHTRANG', DIACHI='$DIACHI', SDT_KH='$SDT_KH', TEN_KH='$TEN_KH' WHERE ID_DH='$ID_DH'";
        mysqli_query($ketnoi, $query_update_ct_donhang);

        echo '<script>';
        echo 'alert("Cập nhật đơn hàng thành công");';
        echo "window.location = 'order.php';";
        echo '</script>';
    } else {
        echo 'Lỗi MySQL: ' . mysqli_error($ketnoi);
    }
}

$ketnoi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Edit Order</h2>

<form method="post" action="">
    <input type="hidden" name="ID_DH" value="<?php echo $ID_DH; ?>">

    <label for="ID_KH">Customer ID:</label>
    <input type="text" id="ID_KH" name="ID_KH" value="<?php echo $ID_KH; ?>" readonly>

    <label for="NGAYDAT">Order Date:</label>
    <input type="date" id="NGAYDAT" name="NGAYDAT" value="<?php echo $NGAYDAT; ?>" required>

    <label for="THANHTOAN">Total:</label>
    <input type="text" id="THANHTOAN" name="THANHTOAN" value="<?php echo $THANHTOAN; ?>" required>

    <label for="TINHTRANG">Order Status:</label>
    <select class="addorder-select" name="TINHTRANG" required>
        <option value="Delivering" <?php echo ($TINHTRANG == 'Delivering') ? 'selected' : ''; ?>>Delivering</option>
        <option value="Wait for confirmation" <?php echo ($TINHTRANG == 'Wait for confirmation') ? 'selected' : ''; ?>>Wait for confirmation</option>
        <option value="Delivered" <?php echo ($TINHTRANG == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
    </select>

    <!-- Thêm các trường mới vào form -->
    <label for="DIACHI">Address:</label>
    <input type="text" id="DIACHI" name="DIACHI" value="<?php echo $DIACHI; ?>" required>

    <label for="SDT_KH">Customer Phone:</label>
    <input type="text" id="SDT_KH" name="SDT_KH" value="<?php echo $SDT_KH; ?>" required>

    <label for="TEN_KH">Customer Name:</label>
    <input type="text" id="TEN_KH" name="TEN_KH" value="<?php echo $TEN_KH; ?>" required>

    <button type="submit" name="save_order">Save</button>
</form>

</body>
</html>
