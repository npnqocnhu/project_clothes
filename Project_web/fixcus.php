<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/addproduct.css">
    <link rel="stylesheet" href="./asset/css/toast.css">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/a">
    <title>Edit Product</title>
</head>
<body>
<?php
include('ketnoi.php');

if (isset($_GET['ID_KH'])) {
    $ID_KH = $_GET['ID_KH'];

    $sql = "SELECT ID_KH, TEN_KH, SDT_KH, DIACHI, USER_KH, MATKHAU_KH FROM khachhang WHERE ID_KH = '$ID_KH'";
    $result = mysqli_query($ketnoi, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $TEN_KH = $row['TEN_KH'];
        $SDT_KH = $row['SDT_KH'];
        $DIACHI = $row['DIACHI'];
        $USER_KH = $row['USER_KH'];
        $MATKHAU_KH = $row['MATKHAU_KH'];
    }

    if (isset($_POST['save_customer'])) {
        $TEN_KH = $_POST['customer_name'];
        $SDT_KH = $_POST['sdt_kh'];
        $DIACHI = $_POST['address'];
        $USER_KH = $_POST['user_kh'];
        $MATKHAU_KH = $_POST['matkhau_kh'];

        $sql = "UPDATE khachhang SET TEN_KH='$TEN_KH', SDT_KH='$SDT_KH', DIACHI='$DIACHI', USER_KH='$USER_KH', MATKHAU_KH='$MATKHAU_KH' WHERE ID_KH = '$ID_KH'";

        if (mysqli_query($ketnoi, $sql)) {
            echo '<script>';
            echo 'alert("Cập nhật thông tin khách hàng thành công");';
            echo "window.location ='customer.php';";
            echo '</script>';
        } else {
            $ketqua = "Cập nhật thông tin khách hàng thất bại: " . mysqli_error($ketnoi);
        }
    }
}
?>

<div class="add-product-main">
    <div class="add-product-cover">
        <div class="add-product-content">
            <h3 class="add-product-title">
                Edit customer
            </h3>
            <form method="POST" action="fixcus.php?ID_KH=<?php echo $ID_KH; ?>">
                <input type="hidden" name="customer_id" value="<?php echo $ID_KH; ?>">
                <div class="add-product-line">
                    <p class="add-product-text">Customer Name</p>
                    <input type="text" class="add-product-input" name="customer_name" value="<?php echo $TEN_KH ?>">
                </div>
                <div class="add-product-line">
                    <p class="add-product-text">Phone</p>
                    <input type="text" class="add-product-input" name="sdt_kh" value="<?php echo $SDT_KH ?>">
                </div>
                <div class="add-product-line">
                    <p class="add-product-text">Address</p>
                    <input type="text" class="add-product-input" name="address" value="<?php echo $DIACHI ?>">
                </div>
                <div class="add-product-line">
                    <p class="add-product-text">Username</p>
                    <input type="text" class="add-product-input" name="user_kh" value="<?php echo $USER_KH ?>">
                </div>
                <div class="add-product-line">
                    <p class="add-product-text">Password</p>
                    <input type="password" class="add-product-input" name="matkhau_kh" value="<?php echo $MATKHAU_KH ?>">
                </div>

                <div class="add-product-btn">
                    <button type="submit" class="add-product-btn-add" name="save_customer">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>