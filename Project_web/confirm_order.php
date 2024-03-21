<!-- confirm_order.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/confirm_order.css">
    <title>Confirm Order</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Xử lý dữ liệu đặt hàng và hiển thị thông tin đơn hàng
            include("ketnoi.php");
            session_start();

            $product_id = mysqli_real_escape_string($ketnoi, $_POST['product_id']);
            $quantity = mysqli_real_escape_string($ketnoi, $_POST['quantity']);

            // Lấy thông tin sản phẩm từ cơ sở dữ liệu
            $sql_product = "SELECT * FROM sanpham WHERE ID_SP = '$product_id'";
            $result_product = mysqli_query($ketnoi, $sql_product);

            if ($result_product->num_rows > 0) {
                $product = $result_product->fetch_assoc();

                // Tạo một mảng để lưu thông tin đơn hàng để hiển thị
                $order_info = array(
                    'product_name' => $product['TEN_SP'],
                    'quantity' => $quantity,
                    'total_price' => $quantity * $product['GIA'],
                    'product_image' => $product['ANH_SP'],
                    // Thêm các thông tin khác cần thiết
                );
            } else {
                echo "Sản phẩm không tồn tại.";
            }
        } else {
            echo "Không có dữ liệu đặt hàng được cung cấp.";
        }
    ?>

    <!-- Hiển thị thông tin đơn hàng -->
    <div class="order-info">
        <img src="./asset/img/shirt/<?php echo $order_info['product_image']; ?>" alt="Product Image">
        <div>
            <p><strong>Product:</strong> <?php echo $order_info['product_name']; ?></p>
            <p><strong>Quantity:</strong> <?php echo $order_info['quantity']; ?></p>
            <p><strong>Total Price:</strong> $<?php echo $order_info['total_price']; ?></p>
            <!-- Thêm các thông tin khác cần thiết -->
        </div>
    </div>

    <!-- Form xác nhận đặt hàng -->
    <form action="success_order.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
        <!-- Thêm các trường thông tin người nhận hàng, địa chỉ, v.v. nếu cần -->
        <button type="submit" class="confirm-button">Confirm Order</button>
    </form>
</body>
</html>
