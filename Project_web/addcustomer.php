<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/addproduct.css">
    <link rel="stylesheet" href="./asset/css/toast.css">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/a">
    <title>Add Customer</title>
</head>
<body>
    <div class="add-product-main">
        <div class="add-product-cover">
            <div class="add-product-content">
                <h3 class="add-product-title">
                    Add Customer
                </h3>
                <form method="POST" action="addcustomer.php">
                    <div class="add-product-line">
                        <p class="add-product-text">Name - Customer</p>
                        <input type="text" class="add-product-input" name="customer_name">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">Phone - Customer</p>
                        <input type="text" class="add-product-input" name="customer_phone">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">Address - Customer</p>
                        <input type="text" class="add-product-input" name="customer_address">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">User - Customer</p>
                        <input type="text" class="add-product-input" name="customer_user">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">Pass word - Customer</p>
                        <input type="text" class="add-product-input" name="customer_pass">
                    </div>

                    <div class="add-product-btn">
                        <button type="submit" class="add-product-btn-add" name="add_customer">
                            Add
                        </button>
                        <button type="reset" class="add-product-btn-resert">Return</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_customer'])) {
        // Kết nối tới cơ sở dữ liệu
        include("ketnoi.php");

        if ($ketnoi->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $ketnoi->connect_error);
        }

        // $customer_id = $_POST['customer_id'];
        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $customer_address = $_POST['customer_address'];
        $customer_user = $_POST['customer_user'];
        $customer_pass = $_POST['customer_pass'];

        // Thêm khách hàng vào cơ sở dữ liệu
        $query = "INSERT INTO khachhang (TEN_KH, SDT_KH, DIACHI, USER_KH, MATKHAU_KH) VALUES ('$customer_name', '$customer_phone', '$customer_address', '$customer_user', '$customer_pass')";

        if (mysqli_query($ketnoi, $query)) {
            echo '<script>';
            echo 'alert("Thêm khách hàng thành công");';
            echo "window.location ='customer.php';";
            echo '</script>';
        } else {
            $ketqua = "Thêm khách hàng thất bại!" . mysqli_error($ketnoi);
        }

        // Đóng kết nối cơ sở dữ liệu
        $ketnoi->close();
    }
    ?>

</body>
</html>