<?php
include("ketnoi.php");

if (isset($_GET['ID_KH'])) {
    $ID_KH = $_GET['ID_KH'];

    // Thực hiện câu lệnh DELETE
    $query = "DELETE FROM khachhang WHERE ID_KH = '$ID_KH'";
    $ketqua = mysqli_query($ketnoi, $query);

    echo "<script>";
    if ($ketqua) {
        echo "alert('Xóa khách hàng thành công');";
    } else {
        echo "alert('Xóa khách hàng không thành công: " . mysqli_error($ketnoi) . "');";
    }
    echo "window.location ='customer.php';";
    echo "</script>";

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($ketnoi);
    exit;
}
?>
