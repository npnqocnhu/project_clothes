<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/mainadmin1.css">
    <link rel="stylesheet" href="./asset/css/ad_product1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./asset/css/custormer.css">
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
                                    <a href=""><li class="ad-header-list-li">List Of Customers</li></a>
                                </ul>
                            </div>
    
                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-star"></i> Evaluate</p>
                                <ul class="ad-header-list-ul">
                                    <a href="./ad_repcmt.php"><li class="ad-header-list-li">Review list</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="grid-8-column">
                        <form action="" class="custormer-form">
                                <div class="custormer-button">
                                    <div class="custormer-button-cover">
                                        <input type="text" class="customer-search" placeholder="Search..." name="search" value="<?php if(isset($_GET["search"])) {echo $_GET["search"];} ?>">
                                        <select name="search_option" class="customer-search-option">
                                            <option value="id">ID</option>
                                            <option value="name">Name</option>
                                            <option value="phone">Phone</option>
                                            <option value="address">Address</option>
                                            <option value="user">User</option>
                                        </select>
                                        <input type="submit" class="customer-btn" value="Search">
                                        <input type="button" class="custormer-btn" value="All" onclick="window.location.href='./customer.php'">
                                    </div>
                                    <a href="./addcustomer.php" class="customer_add_link">
                                        <div class="custormer-btn">                                          
                                                <i class="fa-solid fa-circle-plus"></i>
                                                    Add custormer      
                                        </div>
                                    </a>
                                </div>       
                            <table class="custormer-container">
                                <tr class="custormer-title">
                                    <th class="custormer-column">ID_KH</th>
                                    <th class="custormer-column">Name</th>
                                    <th class="custormer-column">Phone</th>
                                    <th class="custormer-column">Address</th>
                                    <th class="custormer-column">User</th>
                                    <th class="custormer-column">Password</th>
                                    <th class="custormer-column">Action</th>
                                </tr>

                                <?php
                                // Kết nối đến cơ sở dữ liệu
                                    include('ketnoi.php');

                                    if(isset($_GET["search"]) && !empty($_GET["search"])) {
                                        $key = $_GET["search"];
                                        $search_option = $_GET["search_option"];
                                    
                                        switch ($search_option) {
                                            case 'id':
                                                $sql = "SELECT * FROM khachhang WHERE ID_KH LIKE '%$key%'";
                                                break;
                                            case 'name':
                                                $sql = "SELECT * FROM khachhang WHERE TEN_KH LIKE '%$key%'";
                                                break;
                                            case 'phone':
                                                $sql = "SELECT * FROM khachhang WHERE SDT_KH LIKE '%$key%'";
                                                break;
                                            case 'address':
                                                $sql = "SELECT * FROM khachhang WHERE DIACHI LIKE '%$key%'";
                                                break;
                                            case 'user':
                                                $sql = "SELECT * FROM khachhang WHERE USER_KH LIKE '%$key%'";
                                                break;
                                            case 'all':
                                                $sql = "SELECT * FROM khachhang WHERE ID_KH LIKE '%$key%' OR TEN_KH LIKE '%$key%' OR SDT_KH LIKE '%$key%' OR DIACHI LIKE '%$key%' OR USER_KH LIKE '%$key%'";
                                                break;
                                            default:
                                                $sql = "SELECT * FROM khachhang";
                                                break;
                                        }
                                    } else {
                                        $sql= "SELECT * FROM khachhang";
                                    }

                                    $ketqua=mysqli_query($ketnoi, $sql);

                                    if(isset($_POST['delete_customer'])) {
                                        $ID_KH = $_POST['delete_customer'];
                                    
                                        // Sử dụng câu lệnh chuẩn bị để ngăn chặn tấn công SQL injection
                                        $stmt = $ketnoi->prepare("DELETE FROM khachhang WHERE ID_KH = ?");
                                        
                                        // Kiểm tra xem câu truy vấn có thành công hay không
                                        if ($stmt === false) {
                                            die("Lỗi câu truy vấn: " . $ketnoi->error);
                                        }
                                    
                                        // Sử dụng 'i' nếu 'id' là kiểu số nguyên
                                        $stmt->bind_param("i", $ID_KH);
                                        $stmt->close();
                                    }

                                    if ($ketqua->num_rows > 0) {
                                        while ($row = $ketqua->fetch_assoc()) {
                                            echo "<tr class='custormer-line-text'>";
                                            echo "<td class='custormer-line-content'>" . $row["ID_KH"] . "</td>";
                                            echo "<td class='custormer-line-content'>" . $row["TEN_KH"] . "</td>";
                                            echo "<td class='custormer-line-content'>" . $row["SDT_KH"] . "</td>";
                                            echo "<td class='custormer-line-content'>" . $row["DIACHI"] . "</td>";
                                            echo "<td class='custormer-line-content'>" . $row["USER_KH"] . "</td>";
                                            echo "<td class='custormer-line-content'>" . $row["MATKHAU_KH"] . "</td>";
                                            echo "<td class='custormer-line-content'>";
                                            echo '<a href="./fixcus.php?ID_KH=' . $row['ID_KH'] .'"><i class="fa-regular fa-pen-to-square ad-product-icon"></i></a>';
                                            echo '<a href="./delete.php?ID_KH=' . $row['ID_KH'] . '"><i class="fa-solid fa-trash-can ad-product-icon"></i></a>';
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "Không có dữ liệu khách hàng.";
                                    }

                                    $ketnoi->close();
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>