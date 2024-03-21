<?php
include("ketnoi.php");

if (isset($_POST['ID_KH'])) {
    $selectedCustomerId = $_POST['ID_KH'];

    // Truy vấn CSDL để lấy thông tin khách hàng dựa trên ID khách hàng
    $query = "SELECT TEN_KH, DIACHI, SDT_KH FROM khachhang WHERE ID_KH = '$selectedCustomerId'";
    $result = mysqli_query($ketnoi, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Trả về thông tin khách hàng dưới dạng JSON
        echo json_encode($row);
    } else {
        // Trả về chuỗi JSON trống nếu không tìm thấy thông tin khách hàng
        echo json_encode([]);
    }
} else {
    // Trả về chuỗi JSON trống nếu không có ID_KH được gửi đến
    echo json_encode([]);
}
?>

<?php
include("ketnoi.php");

if (isset($_POST['ID_SP'])) {
    $selectedProductId = $_POST['ID_SP'];

    // Truy vấn CSDL để lấy tên sản phẩm dựa trên ID sản phẩm
    $query = "SELECT TEN_SP FROM sanpham WHERE ID_SP = '$selectedProductId'";
    $ketqua = mysqli_query($ketnoi, $query);

    if ($ketqua && $row = mysqli_fetch_assoc($ketqua)) {
        // Trả về tên sản phẩm
        echo $row['TEN_SP'];
    } else {
        // Trả về chuỗi trống nếu không tìm thấy sản phẩm
        echo '';
    }
} else {
    // Trả về chuỗi trống nếu không có ID_SP được gửi đến
    echo '';
}
?>



