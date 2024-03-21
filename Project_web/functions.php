// functions.php
<?php

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

// Các hàm khác nếu cần
?>
