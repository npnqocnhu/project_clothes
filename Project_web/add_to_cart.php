<?php
session_start();
include("ketnoi.php");
include("functions.php");

if (isset($_POST['add_to_cart'])) {
    // Xử lý thêm vào giỏ hàng
    $product_id = mysqli_real_escape_string($ketnoi, $_POST['product_id']);
    $customer_id = $_SESSION['ID_KH'];
    $quantity = mysqli_real_escape_string($ketnoi, $_POST['cart_quantity']);

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    $product = getProductDetails($product_id);

    if (!$product) {
        die('Lỗi: Sản phẩm không tồn tại.');
    }

    // Thêm dữ liệu vào bảng giohang
    $insert_cart_query = $ketnoi->prepare("INSERT INTO giohang (ID_SP, ID_KH, TEN_SP, SOLUONG, GIA) VALUES (?, ?, ?, ?, ?)");

    if (!$insert_cart_query) {
        die('Lỗi chuẩn bị câu truy vấn: ' . $ketnoi->error);
    }

    $insert_cart_query->bind_param("ssssi", $product_id, $customer_id, $product['TEN_SP'], $quantity, $product['GIA']);

    if ($insert_cart_query->execute()) {
        echo '<script>';
        echo 'alert("Sản phẩm đã được thêm vào giỏ hàng.");';
        echo "window.history.go(-1);";
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("Sản phẩm đã có trong giỏ hàng!");';
        echo "window.history.go(-1);";
        echo '</script>';
    }

    // Đóng câu lệnh prepared statement
    $insert_cart_query->close();

    echo '<script>';
    echo 'window.parent.document.getElementById("cartModal").style.display = "none";';
    echo '</script>';
} else {
    echo "Không có dữ liệu thêm vào giỏ hàng được gửi.";
}
?>
