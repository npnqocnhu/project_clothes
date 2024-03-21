<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/addproduct.css">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Add Product</title>
</head>
<body>
    <div class="add-product-main">
        <div class="add-product-cover">
            <div class="add-product-content">
                <h3 class="add-product-title">
                    Add Product
                </h3>
                <form method="POST" action="addproduct.php" enctype="multipart/form-data">
                    <div class="add-product-line line-row">
                        <p class="add-product-text">ID - Category</p>
                        <select class="add-product-select" name="category_id">
                            <option value="101">101 - Clothes</option>
                            <option value="102">102 - Shoes</option>
                            <option value="103">103 - Accessory</option>
                        </select>
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">ID - Product</p>
                        <input type="number" class="add-product-input" name="product_id">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">Image - Product</p>
                        <input type="file" class="add-product-input" name="image_file">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">Name - Product</p>
                        <input type="text" class="add-product-input" name="product_name">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">Old Price - Product</p>
                        <input type="number" class="add-product-input" name="old_price">
                    </div>
                    <div class="add-product-line">
                        <p class="add-product-text">New Price - Product</p>
                        <input type="number" class="add-product-input" name="new_price">
                    </div>

                    <div class="add-product-btn">
                        <button type="submit" class="add-product-btn-add" name="add_product">
                            Add
                        </button>
                        <button type="reset" class="add-product-btn-resert">Return</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    // Kết nối tới cơ sở dữ liệu
    include("ketnoi.php");

    if ($ketnoi->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $ketnoi->connect_error);
    }

    $category_id = $_POST['category_id'];
    $product_id = $_POST['product_id'];
    
    // Sử dụng mysqli_real_escape_string để tránh SQL injection
    $product_name = mysqli_real_escape_string($ketnoi, $_POST['product_name']);
    
    $old_price = $_POST['old_price'];
    $new_price = $_POST['new_price'];

    // Lấy tên tệp ảnh đã tải lên
    $uploadedFileName = basename($_FILES["image_file"]["name"]);

    // Thêm sản phẩm vào cơ sở dữ liệu với tên tệp ảnh
    $query = "INSERT INTO sanpham (ID_SP, TEN_SP, ANH_SP, GIACU_SP, GIA, ID_DM) 
              VALUES ('$product_id', '$product_name', '$uploadedFileName', '$old_price', '$new_price', '$category_id')";

    if (mysqli_query($ketnoi, $query)) {
        echo '<script>';
        echo 'alert("Thêm sản phẩm thành công");';
        echo "window.location ='ad_product.php';";
        echo '</script>';
    } else {
        $ketqua = "Thêm sản phẩm thất bại!" . mysqli_error($ketnoi);
    }

    // Đóng kết nối cơ sở dữ liệu
    $ketnoi->close();
}
?>

</body>
</html>
