<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/mainadmin1.css">
    <link rel="stylesheet" href="./asset/css/ad_product1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kanit:wght@500&family=Quicksand:wght@700&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="admin-main">
        <div class="admin__header">
            <ul class="admin-main__header">
                <li class="admin-main__header-title">Kingdom</li>
            </ul>
            <ul class="admin-main__header">
                <!-- <li class="admin__search-li">
                    <input type="text" class="admin__search" placeholder="Search">
                    <span class="admin__search-li-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </li> -->
    
                <li class="admin__search-li open_login_ad">
                    <span class="admin-name">
                        Admin
                        <i class="fa-solid fa-caret-down"></i>
                    </span>
                    <div class="admin__login">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <a href="./admin.php">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="admin-content">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid-2-column">
                        <div class="admin-menu-list">
                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-house"></i> Home Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href="./mainadmin.php"><li class="ad-header-list-li">Home</li></a>
                                    <!-- <a href="./chat.php"><li class="ad-header-list-li">Chat</li></a> -->
                                </ul>
                            </div>
                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-shirt"></i>  Product Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href="ad_product.php?category=Shirt"><li class="ad-header-list-li">Clothes</li></a>
                                    <a href="ad_product.php?category=Shoes"><li class="ad-header-list-li">Shoes</li></a>
                                    <a href="ad_product.php?category=Accessory"><li class="ad-header-list-li">Accessory</li></a>
                                </ul>
                            </div>
    
                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-truck-fast"></i> Order Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href="./order.php"><li class="ad-header-list-li">The Order</li></a>
                                    <!-- <a href="./detail_order.php"><li class="ad-header-list-li">Shipping Orders</li></a> -->
                                </ul>
                            </div>
    
                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-user"></i> Customer Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href="./customer.php"><li class="ad-header-list-li">List Of Customers</li></a>
                                </ul>
                            </div>
    
                            <!-- <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-clipboard-list"></i> Inventory Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href=""><li class="ad-header-list-li">The Number Of Products</li></a>
                                    <a href=""><li class="ad-header-list-li">Update Product Quantity</li></a>
                                </ul>
                            </div> -->
    
                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-star"></i> Evaluate</p>
                                <ul class="ad-header-list-ul">
                                    <a href=""><li class="ad-header-list-li">Review list</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="grid-8-column">
                        <div class="ad_product">
                            <div class="ad_product-main">
                                <form action="" method="get" class="ad-product-header">
                                        <a href="./addproduct.php" class="ad-product-header-link">
                                            <div class="ad-product-header__icon">
                                                <i class="fa-solid fa-circle-plus"></i>
                                                Add Products
                                            </div>
                                        </a>
                                        <div class="ad-product-header__search">
                                            Search: <input type="text" class="ad-product-input__search" name="search" placeholder="Enter your search term" value ="<?php if(isset($_GET["search"])) {echo $_GET["search"];} ?>">
                                            <input type="submit" class="ad-product-btn" value="Search">
                                            <input type="button" class="ad-product-btn" value="All" onclick="window.location.href='./ad_product.php'">
                                        </div>
                                    </form>
                                <div class="ad-product-title">
                                    <p class="ad-product-title-type ad-type-id">ID</p>
                                    <p class="ad-product-title-type ad-type-id">Image</p>
                                    <p class="ad-product-title-type" >Product</p>
                                    <p class="ad-product-title-type ad-type-id ad-type-right">Old Price</p>
                                    <p class="ad-product-title-type ad-type-id">Price</p>
                                    <p class="ad-product-title-type ad-type-id">Category</p>
                                    <p class="ad-product-title-type ad-type-id">
                                        Action
                                    </p>                
                                </div>

                                <?php
                                   include('ketnoi.php');
                                   $category = "all";
                                   
                                   // Kiểm tra xem tham số "category" có tồn tại trong URL không
                                   if (isset($_GET['category'])) {
                                       $category = $_GET['category'];
                                   }
                                   
                                   // Kiểm tra xem tham số "search" có tồn tại trong URL không
                                   if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                       $key = $_GET["search"];
                                       $sql = "SELECT ID_SP, ANH_SP, TEN_SP, GIACU_SP, GIA, ID_DM FROM sanpham WHERE (ID_DM IN (101, 102, 103) AND (ID_SP LIKE '%$key%' OR TEN_SP LIKE '%$key%' OR ID_DM LIKE '%$key%'))";
                                   } else {
                                       if ($category === "all") {
                                           // Hiển thị tất cả sản phẩm
                                           $sql = "SELECT ID_SP, ANH_SP, TEN_SP, GIACU_SP, GIA, ID_DM FROM sanpham WHERE ID_DM IN (101, 102, 103)";
                                       } else {
                                           // Dựa vào giá trị của $category để xác định danh mục
                                           if ($category === 'Shirt') {
                                               $sql = "SELECT ID_SP, ANH_SP, TEN_SP, GIACU_SP, GIA, ID_DM FROM sanpham WHERE ID_DM IN (101)";
                                           } elseif ($category === 'Shoes') {
                                               $sql = "SELECT ID_SP, ANH_SP, TEN_SP, GIACU_SP, GIA, ID_DM FROM sanpham WHERE ID_DM IN (102)";
                                           } elseif ($category === 'Accessory')  {
                                               $sql = "SELECT ID_SP, ANH_SP, TEN_SP, GIACU_SP, GIA, ID_DM FROM sanpham WHERE ID_DM IN (103)";
                                           }else{
                                                echo "Không có sản phẩm nào được tìm thấy";
                                           }
                                       }
                                   }
                                   
                                   // Thực hiện truy vấn và hiển thị kết quả
                                   $ketqua = mysqli_query($ketnoi, $sql);

                                    if(isset($_POST['delete_product'])) {
                                        $ID_SP = $_POST['delete_product'];
                                    
                                        // Sử dụng câu lệnh chuẩn bị để ngăn chặn tấn công SQL injection
                                        $stmt = $ketnoi->prepare("DELETE FROM sanpham WHERE ID_SP = ?");
                                        
                                        // Kiểm tra xem câu truy vấn có thành công hay không
                                        if ($stmt === false) {
                                            die("Lỗi câu truy vấn: " . $ketnoi->error);
                                        }
                                    
                                        // Sử dụng 'i' nếu 'id' là kiểu số nguyên
                                        $stmt->bind_param("i", $ID_SP);
                                        $stmt->close();
                                    }

                                    if ($ketqua->num_rows > 0) {
                                        echo '<table class="ad-product-table">';
                                        echo '<tbody class="ad-product-tbody">';
                                        
                                        while($row = $ketqua->fetch_assoc()) {
                                            echo '<tr class="ad-product-line">';
                                            echo '<td class="ad-product-row ad-type-row">' . $row['ID_SP'] . '</td>';
                                            echo '<td class="ad-product-row ad-type-row"><img class="ad-product-img" src="./asset/img/shirt/' . $row['ANH_SP'] . '" alt="" class="ad-product-img"></td>';
                                            echo '<td class="ad-product-row">' . $row['TEN_SP'] . '</td>';
                                            echo '<td class="ad-product-row ad-type-row">$' . $row['GIACU_SP'] . '</td>';
                                            echo '<td class="ad-product-row ad-type-row">$' . $row['GIA'] . '</td>';
                                            echo '<td class="ad-product-row ad-type-row">' . $row['ID_DM'] . '</td>';
                                            echo '<td class="ad-product-row ad-type-row">';
                                            echo '<a href="./fixproduct.php?ID_SP=' . $row['ID_SP'] .'"><i class="fa-regular fa-pen-to-square ad-product-icon"></i></a>';
                                            echo '<a href="javascript:void(0);" onclick="confirmDelete(' . $row['ID_SP'] . ')"><i class="fa-solid fa-trash-can ad-product-icon"></i></a>';
                                            echo '</form>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        
                                        echo '</tbody>';
                                        echo '</table>';
                                    } else {
                                        echo "Không có sản phẩm nào được tìm thấy";
                                    }
                                    
                                    $ketnoi->close();
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(productID) {
            var result = confirm("Are you sure you want to delete this product?");
            if (result) {
                // Nếu người dùng đồng ý xóa, chuyển hướng đến trang xóa với thông tin sản phẩm
                window.location.href = "./deleteproduct.php?ID_SP=" + productID;
            }
        }
    </script>
</body>
</html>