<?php
session_start();
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem phiên đã đăng nhập có tồn tại không
    if (isset($_SESSION['ID_KH'])) {
        $customer_id = $_SESSION['ID_KH'];
    } else {
        echo '<script>';
        echo 'alert("Please log in!");';
        echo "window.history.go(-1);";
        echo '</script>';
        exit;
    }

    $newReview = mysqli_real_escape_string($ketnoi, $_POST['newReview']);
    $product_id = mysqli_real_escape_string($ketnoi, $_POST['product_id']);

    // Tạo ID_DGIA (7 ký tự và số ngẫu nhiên)
    $id_dgia = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 7);

    // Sử dụng prepared statements
    $sql_insert_review = "INSERT INTO danhgia_sp (ID_DGIA, ID_SP, ID_KH, NOIDUNG_DG) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($ketnoi, $sql_insert_review);

    mysqli_stmt_bind_param($stmt, "ssss", $id_dgia, $product_id, $customer_id, $newReview);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>';
        echo 'alert("Evaluation of success!");';
        echo "window.history.go(-1);";
        echo '</script>';
    } else {
        echo 'Lỗi khi thêm đánh giá: ' . mysqli_error($ketnoi);
    }

    // Đóng kết nối và statement
    mysqli_stmt_close($stmt);
    mysqli_close($ketnoi);
} else {
    echo "Không có dữ liệu đánh giá được gửi.";
}
?>
