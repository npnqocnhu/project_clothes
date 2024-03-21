<?php
    session_start();
    include("ketnoi.php");

    if (isset($_GET['id'])) {
        $product_id = mysqli_real_escape_string($ketnoi, $_GET['id']);
        $sql_product = "SELECT * FROM sanpham WHERE ID_SP = '$product_id'";
        $result_product = mysqli_query($ketnoi, $sql_product);

    if ($result_product->num_rows > 0) {
        $product = $result_product->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <!-- <link rel="stylesheet" href="./asset/css/infproduct.css"> -->
    <title>Product Information</title>
    <style>
        body {
        font-family: 'Poppins', sans-serif;
        width: 100%;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .inf-product-card {
        display: flex;
        transform: translateY(5%);
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        justify-content: center;
        align-items: center;
        margin: 50px; /* Căn giữa theo chiều ngang */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .inf-product-details {
        padding: 20px;
        width: 40%; /* Giảm chiều rộng của form */
    }

    .inf-product-image {
        width: 300px;
        object-fit: cover;
    }

    .inf-product-name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .inf-product-price {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .inf-product-discount {
        color: #e44d26;
        font-size: 18px;
        font-weight: bold;
    }

    del {
        color: #555;
        margin-left: 10px;
    }

    label {
        font-size: 16px;
        margin-bottom: 5px;
        display: block;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #e44d26;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    button:hover {
        background-color: #333;
    }

    h2 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .review-container {
        box-sizing: border-box;
        border: 1px solid #ddd;
        padding: 20px; /* Tăng padding để phần đánh giá trông lớn hơn */
        margin-bottom: 10px;
    }

    .review-heading,
    .review-info,
    .review-content {
        word-wrap: break-word; /* Đảm bảo văn bản không bị tràn khỏi phần container */
    }

    .review-heading,
    .review-info {
        margin-bottom: 5px;
    }

    .review-content {
        margin-bottom: 10px;
    }

    .no-reviews {
        font-size: 16px;
        color: #888;
    }

    .review{
        width: 100%;
        margin-right: 20px;
    }

    .review-cover{
        width: 50%;
        display: flex;
        flex-direction: column;
        overflow-y: auto; /* Sử dụng thanh cuộn khi nội dung vượt quá kích thước */
        max-height: 400px; /* Đặt chiều cao tối đa cho phần đánh giá */
    }

    #totalPayment{
        color: #000;
        font-size: 18px;
        font-weight: bold;
    }

    .cart-label{
        margin-top: 10px;
    }
</style>

</head>
<body>
    <div class="inf-product-card">
        <img class="inf-product-image" src="./asset/img/shirt/<?php echo isset($product['ANH_SP']) ? $product['ANH_SP'] : ''; ?>" alt="Ảnh sản phẩm">
        <div class="inf-product-details">
        <div class="inf-product-name"><?php echo isset($product['TEN_SP']) ? $product['TEN_SP'] : ''; ?></div>
        <div class="inf-product-price">
            <div class="">
                <span class="inf-product-discount">$<?php echo isset($product['GIA']) ? $product['GIA'] : ''; ?></span>
                <del>$<?php echo isset($product['GIACU_SP']) ? $product['GIACU_SP'] : ''; ?></del>
            </div>
        </div>

        <form method="POST" action="process_order.php">
            <label for="quantity">Quantity:</label>
            <input style="height:20px; width:100px;" type="number" id="quantity" name="quantity" min="1" value="1" required>
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <label for="customerAddress">Address:</label>
            <input type="text" id="customerAddress" name="DIACHI" required>
            <label for="customerPhone">Phone:</label>
            <input type="text" id="customerPhone" name="SDT_KH" required>

            <!-- Thêm ô THANHTOAN vào trong form -->
            <div id="totalPayment">Total: $<?php echo isset($product['GIA']) ? $product['GIA'] : ''; ?></div>

            <button type="submit" name="add_order">Order</button>
        </form>

        <div id="cartModal" class="modal">
            <div class="modal-content">
                <form method="POST" action="add_to_cart.php">
                    <label class="cart-label" for="cartQuantity">Quantity added to cart:</label>
                    <input style="height:20px; width:100px;" type="number" id="cartQuantity" name="cart_quantity" min="1" value="1" required>
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <button type="submit" name="add_to_cart"><i style="font-size: 20px;" class="fa-solid fa-cart-shopping"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="review-cover">
        <h2>Product reviews</h2>

        <?php
        $sql_reviews = "SELECT * FROM danhgia_sp WHERE ID_SP = '$product_id'";
        $result_reviews = mysqli_query($ketnoi, $sql_reviews);

        if ($result_reviews) {
            if (mysqli_num_rows($result_reviews) > 0) {
                while ($review = mysqli_fetch_assoc($result_reviews)) {
                    echo '<div class="review">';
                    echo '<div class="review-container">';
                    echo '<p class="review-heading">ID_KH: ' . $review['ID_KH'] . '</p>';
                    echo '<p class="review-content">Content: ' . $review['NOIDUNG_DG'] . '</p>';
                    echo '<p class="review-info">Admin: ' . $review['TRALOI'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p class="no-reviews">Chưa có đánh giá nào cho sản phẩm này.</p>';
            }
        } else {
            echo '<p class="no-reviews">Lỗi khi truy vấn cơ sở dữ liệu: ' . mysqli_error($ketnoi) . '</p>';
        }
        ?>

    </div>

    <!-- Thêm form để người dùng nhập đánh giá mới -->
    <form class="form-review" method="POST" action="process_rating.php">
        <label for="newReview">Your review:</label>
        <input type="text" id="newReview" name="newReview" required>

        <!-- Thêm input ẩn để lưu ID_SP và ID_KH -->
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">

        <button type="submit" name="submitReview">Submit</button>
    </form>
    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            var quantity = this.value;
            var productPrice = <?php echo isset($product['GIA']) ? $product['GIA'] : 0; ?>;
            var totalPayment = quantity * productPrice;

            document.getElementById('totalPayment').innerText = 'Total: $' + totalPayment.toFixed(2);
        });

        document.getElementById('quantity').addEventListener('input', function() {
        var quantity = this.value;
        var productPrice = <?php echo isset($product['GIA']) ? $product['GIA'] : 0; ?>;
        var totalPayment = quantity * productPrice;

        document.getElementById('totalPayment').innerText = 'Total: $' + totalPayment.toFixed(2);
    });
    </script>

<script>
// Get the modal
var modal = document.getElementById('cartModal');

// Get the button that opens the modal
var btn = document.getElementById('cartIcon');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = 'block';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = 'none';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

</body>
</html>
<?php
    } else {
        echo "Sản phẩm không tồn tại.";
    }
    } else {
        echo "Không có ID sản phẩm được cung cấp.";
    }
?>
