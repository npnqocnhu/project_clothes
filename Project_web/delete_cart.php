<?php
// Kết nối đến cơ sở dữ liệu
include("ketnoi.php");

// Kiểm tra xem có tham số id được truyền vào không
if(isset($_GET['id'])) {
    $id_sp = $_GET['id'];

    // Xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE FROM giohang WHERE ID_SP = $id_sp";
    if ($ketnoi->query($sql) === TRUE) {
        echo '<script>';
            echo 'alert("Successfully deleted products from the order!");';
            echo "window.location ='view_cart.php';";
        echo '</script>';
    } else {
        echo "Lỗi: " . $ketnoi->error;
    }
} 
// Đóng kết nối
$ketnoi->close();
?>
