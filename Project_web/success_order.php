<!-- process_order.php -->
<?php
include("ketnoi.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý và thêm dữ liệu vào cơ sở dữ liệu
    $product_id = mysqli_real_escape_string($ketnoi, $_POST['product_id']);
    $quantity = mysqli_real_escape_string($ketnoi, $_POST['quantity']);

    // Lấy thông tin khách hàng từ SESSION (đã đăng nhập)
    $customer_id = $_SESSION['ID_KH'];
    $customer_name = $_SESSION['TEN_KH'];
    $customer_address = $_SESSION['DIACHI'];
    $customer_phone = $_SESSION['SDT_KH'];

    // Thêm dữ liệu vào cơ sở dữ liệu (bảng ct_donhang và donhang)
    // ... (sử dụng các giá trị từ POST và SESSION)

    // Hiển thị thông báo hoặc chuyển hướng đến trang cảm ơn
    echo "Đơn hàng của bạn đã được đặt thành công!";
} else {
    echo "Không có dữ liệu đặt hàng được cung cấp.";
}
?>
