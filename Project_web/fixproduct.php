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

// Check if the product ID is set in the URL
if (isset($_GET['ID_SP'])) {
    $ID_SP = $_GET['ID_SP'];

    // Retrieve product information from the database
    $sql = "SELECT ID_SP, ANH_SP, TEN_SP, GIACU_SP, GIA, ID_DM FROM sanpham WHERE ID_SP = '$ID_SP'";
    $ketqua = mysqli_query($ketnoi, $sql);

    // Process the form submission
    if (isset($_POST['save_product'])) {
        $TEN_SP = mysqli_real_escape_string($ketnoi, $_POST['product_name']);
        $GIACU_SP = intval($_POST['old_price']);
        $GIA = intval($_POST['new_price']);
        $ID_DM = intval($_POST['category_id']);

        // Check if a new file is selected
        if ($_FILES['image_url']['size'] > 0) {
            // Process the uploaded image
            $imageFileName = $_FILES['image_url']['name'];
            $imageTmpName = $_FILES['image_url']['tmp_name'];
            $imageUploadPath = ".C:/xampp/htdocs/Project_web/asset/img/shirt/" . $imageFileName;

            // Move the uploaded file to the specified directory
            move_uploaded_file($imageTmpName, $imageUploadPath);

            $sql = "UPDATE sanpham SET TEN_SP='$TEN_SP', GIACU_SP='$GIACU_SP', GIA='$GIA', ID_DM='$ID_DM', ANH_SP='$imageFileName' WHERE ID_SP = '$ID_SP'";
        } else {
            // No new file selected, update without changing the image
            $sql = "UPDATE sanpham SET TEN_SP='$TEN_SP', GIACU_SP='$GIACU_SP', GIA='$GIA', ID_DM='$ID_DM' WHERE ID_SP = '$ID_SP'";
        }

        if (mysqli_query($ketnoi, $sql)) {
            echo '<script>alert("Product update successful!"); window.location ="ad_product.php";</script>';
        } else {
            echo "Product update fail!" . mysqli_error($ketnoi);
        }
    }

    // Retrieve product details for pre-filling the form
    $sql = "SELECT ID_SP, TEN_SP, ANH_SP, GIACU_SP, GIA, ID_DM FROM sanpham WHERE ID_SP = '$ID_SP'";
    $result = mysqli_query($ketnoi, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $TEN_SP = $row['TEN_SP'];
        $GIACU_SP = $row['GIACU_SP'];
        $GIA = $row['GIA'];
        $ID_DM = $row['ID_DM'];
    }
}
?>


    <div class="add-product-main">
        <div class="add-product-cover">
            <div class="add-product-content">
                <h3 class="add-product-title">Edit products</h3>
                <form method="POST" action="fixproduct.php?ID_SP=<?php echo $ID_SP; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?php echo $ID_SP; ?>">

                    <div class="add-product-line line-row">
                        <p class="add-product-text">ID - Category</p>
                        <select class="add-product-select" name="category_id">
                            <option value="101" <?php echo ($ID_DM == 101) ? 'selected' : ''; ?>>101 - Clothes</option>
                            <option value="102" <?php echo ($ID_DM == 102) ? 'selected' : ''; ?>>102 - Shoes</option>
                            <option value="103" <?php echo ($ID_DM == 103) ? 'selected' : ''; ?>>103 - Accessory</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <div class="add-product-line">
                        <p class="add-product-text">Image - Product</p>
                        <input type="file" class="add-product-input" name="image_url">
                    </div>

                    <div class="add-product-line">
                        <p class="add-product-text">Name - Product</p>
                        <input type="text" class="add-product-input" name="product_name" value="<?php echo $TEN_SP; ?>">
                    </div>

                    <div class="add-product-line">
                        <p class="add-product-text">Old Price - Product</p>
                        <input type="number" class="add-product-input" name="old_price" value="<?php echo $GIACU_SP; ?>">
                    </div>

                    <div class="add-product-line">
                        <p class="add-product-text">New Price - Product</p>
                        <input type="number" class="add-product-input" name="new_price" value="<?php echo $GIA; ?>">
                    </div>

                    <div class="add-product-btn">
                        <button type="submit" class="add-product-btn-add" name="save_product">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
