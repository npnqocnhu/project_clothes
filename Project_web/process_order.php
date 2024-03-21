<?php
session_start();
include("ketnoi.php");

if (isset($_POST['add_order'])) {
    $product_id = mysqli_real_escape_string($ketnoi, $_POST['product_id']);
    $customer_address = mysqli_real_escape_string($ketnoi, $_POST['DIACHI']);
    $customer_phone = mysqli_real_escape_string($ketnoi, $_POST['SDT_KH']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    $order_id = generateRandomID(6);
    $customer_id = $_SESSION['ID_KH'];

    // Lấy thông tin khách hàng từ phiên đăng nhập
    $customer = getCustomerDetails($customer_id);

    if (!$customer) {
        echo '<script>';
        echo 'alert("Please log in!");';
        echo "window.history.go(-1);";
        echo '</script>';
        exit;
    }

    $current_date = date("Y-m-d H:i:s");
    $product = getProductDetails($product_id);

    if (!$product) {
        echo "Lỗi: Sản phẩm không tồn tại.";
        exit;
    }

    $total_payment = $product['GIA'] * $quantity;

    // Sử dụng prepared statements để đảm bảo an toàn và tránh lỗi cú pháp SQL
    $insert_order_query = $ketnoi->prepare("INSERT INTO donhang (ID_DH, ID_KH, NGAYDAT, THANHTOAN, TINHTRANG) VALUES (?, ?, ?, ?, 'Delivering')");
    $insert_order_query->bind_param("ssss", $order_id, $customer_id, $current_date, $total_payment);
    
    $insert_order_detail_query = $ketnoi->prepare("INSERT INTO ct_donhang (ID_CT, ID_DH, ID_KH, ID_SP, TEN_KH, DIACHI, SDT_KH, TEN_SP, SOLUONG, GIA, NGAYDAT, THANHTOAN, TINHTRANG) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Delivering')");
    $insert_order_detail_query->bind_param("ssssssssssss", $order_id, $order_id, $customer_id, $product_id, $customer['TEN_KH'], $customer_address, $customer_phone, $product['TEN_SP'], $quantity, $product['GIA'], $current_date, $total_payment);

    // Thực hiện các câu lệnh prepared statements
    if ($insert_order_query->execute() && $insert_order_detail_query->execute()) {
        echo '<script>';
        echo 'alert("You have placed your order successfully!");';
        echo "window.history.go(-1);"; // Điều này sẽ chuyển hướng người dùng về trang trước đó
        echo '</script>';
    } else {
        echo "Lỗi khi đặt hàng: " . $ketnoi->error;
    }
    
    // Đóng các câu lệnh prepared statements
    $insert_order_query->close();
    $insert_order_detail_query->close();
} else {
    echo "Không có dữ liệu đặt hàng được gửi.";
}

function generateRandomID($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomID = '';
    for ($i = 0; $i < $length; $i++) {
        $randomID .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomID;
}

function getProductDetails($product_id) {
    global $ketnoi;
    $sql_product = "SELECT * FROM sanpham WHERE ID_SP = '$product_id'";
    $result_product = mysqli_query($ketnoi, $sql_product);
    if ($result_product->num_rows > 0) {
        return $result_product->fetch_assoc();
    } else {
        return null;
    }
}

function getCustomerDetails($customer_id) {
    global $ketnoi;
    $sql_customer = "SELECT * FROM khachhang WHERE ID_KH = '$customer_id'";
    $result_customer = mysqli_query($ketnoi, $sql_customer);
    if ($result_customer->num_rows > 0) {
        return $result_customer->fetch_assoc();
    } else {
        return null;
    }
}
?>
