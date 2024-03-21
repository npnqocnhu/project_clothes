<?php
include("ketnoi.php");

if (isset($_POST['ID_SP'])) {
    $selectedProductId = $_POST['ID_SP'];

    // Truy vấn CSDL để lấy thông tin sản phẩm dựa trên ID_SP
    $query = "SELECT GIA FROM sanpham WHERE ID_SP = '$selectedProductId'";
    $ketqua = mysqli_query($ketnoi, $query);

    if ($ketqua && $row = mysqli_fetch_assoc($ketqua)) {
        // Trả về giá sản phẩm
        echo $row['GIA'];
    } else {
        // Trả về chuỗi trống nếu không tìm thấy giá
        echo '';
    }
} else {
    // Trả về chuỗi trống nếu không có ID_SP được gửi đến
    echo '';
}
?>