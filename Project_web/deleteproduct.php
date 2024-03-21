

<?php
include("ketnoi.php");

if (isset($_GET['ID_SP'])) {
    $ID_SP = $_GET['ID_SP'];

    // Thực hiện câu lệnh DELETE
    $query = "DELETE FROM sanpham WHERE ID_SP = '$ID_SP'";
    if (mysqli_query($ketnoi, $query)) {
        echo '<script>';
        echo 'alert("Product deletion successful!");';
        echo "window.location ='ad_product.php';";
        echo '</script>';
    } else {
        $ketqua = "Product deletion fail!" . mysqli_error($ketnoi);
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($ketnoi);
}

header("Location: ad_product.php");

?>