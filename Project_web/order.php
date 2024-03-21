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
    <link rel="stylesheet" href="./asset/css/order.css">
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
                                    <a href="./mainadmin.php">
                                        <li class="ad-header-list-li">Home</li>
                                    </a>
                                    <!-- <a href="./chat.php"><li class="ad-header-list-li">Chat</li></a> -->
                                </ul>
                            </div>
                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-shirt"></i> Product Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href="ad_product.php?category=Shirt">
                                        <li class="ad-header-list-li">Clothes</li>
                                    </a>
                                    <a href="ad_product.php?category=Shoes">
                                        <li class="ad-header-list-li">Shoes</li>
                                    </a>
                                    <a href="ad_product.php?category=Accessory">
                                        <li class="ad-header-list-li">Accessory</li>
                                    </a>
                                </ul>
                            </div>

                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-truck-fast"></i> Order Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href="#">
                                        <li class="ad-header-list-li">The Order</li>
                                    </a>
                                    <!-- <a href="./detailorder.php"><li class="ad-header-list-li">Shipping Orders</li></a> -->
                                </ul>
                            </div>

                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-user"></i> Customer Management</p>
                                <ul class="ad-header-list-ul">
                                    <a href="./customer.php">
                                        <li class="ad-header-list-li">List Of Customers</li>
                                    </a>
                                </ul>
                            </div>

                            <div class="admin-content-list">
                                <p class="ad-header-list"><i class="fa-solid fa-star"></i> Evaluate</p>
                                <ul class="ad-header-list-ul">
                                    <a href="./ad_repcmt.php">
                                        <li class="ad-header-list-li">Review list</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="grid-8-column">
                        <form action="" method="post" class="order-form">
                            <div class="order-button">
                                <div class="order-button-cover">
                                    <input type="text" class="customer-search" placeholder="Search..." name="search" value="<?php if (isset($_POST["search"])) {echo htmlspecialchars($_POST["search"]);} ?>">
                                    <select name="search_option" class="customer-search-option">
                                        <option value="id_dh">ID_DH</option>
                                        <option value="id_kh">ID_KH</option>
                                        <option value="date">Date</option>
                                        <option value="total">Total</option>
                                        <option value="status">Order Status</option>
                                    </select>
                                    <input type="submit" class="customer-btn" value="Search">
                                    <input type="button" class="custormer-btn" value="All" onclick="window.location.href='./order.php'">
                                </div>
                                <a href="./addorder.php" class="order_add_link">
                                    <div class="order-btn">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        Add Order
                                    </div>
                                </a>
                            </div>

                            <table class="order-container">
                                <tr class="order-title">
                                    <th class="order-column">ID_DH</th>
                                    <th class="order-column">ID_KH</th>
                                    <th class="order-column">Date</th>
                                    <th class="order-column">Total</th>
                                    <th class="order-column">Order Status</th>
                                    <th class="order-column">Action</th>
                                </tr>

                                <?php
                                include('ketnoi.php');

                                if (isset($_POST["search"]) && !empty($_POST["search"])) {
                                    $key = $_POST["search"];
                                    $search_option = $_POST["search_option"];

                                    switch ($search_option) {
                                        case 'id_dh':
                                            $sql = "SELECT * FROM donhang WHERE ID_DH LIKE '%$key%'";
                                            break;
                                        case 'id_kh':
                                            $sql = "SELECT * FROM donhang WHERE ID_KH LIKE '%$key%'";
                                            break;
                                        case 'date':
                                            $sql = "SELECT * FROM donhang WHERE NGAYDAT LIKE '%$key%'";
                                            break;
                                        case 'total':
                                            $sql = "SELECT * FROM donhang WHERE THANHTOAN LIKE '%$key%'";
                                            break;
                                        case 'status':
                                            $sql = "SELECT * FROM donhang WHERE TINHTRANG LIKE '%$key%'";
                                            break;
                                        case 'all':
                                            $sql = "SELECT * FROM donhang WHERE ID_DH LIKE '%$key%' OR ID_KH LIKE '%$key%' OR NGAYDAT LIKE '%$key%' OR THANHTOAN LIKE '%$key%' OR TINHTRANG LIKE '%$key%'";
                                            break;
                                        default:
                                            $sql = "SELECT * FROM donhang";
                                            break;
                                    }
                                } else {
                                    $sql = "SELECT * FROM donhang";
                                }

                                $ketqua = mysqli_query($ketnoi, $sql);

                                if (isset($_POST['delete_button'])) {
                                    echo "Delete button is set! ID_DH = " . $_POST['delete_button'];
                                    // Xử lý xóa
                                    $ID_DH_to_delete = $_POST['delete_button'];
                                    $query_delete_ct_donhang = "DELETE FROM ct_donhang WHERE ID_DH = '$ID_DH_to_delete'";
                                    if (mysqli_query($ketnoi, $query_delete_ct_donhang)) {
                                        $query_delete_donhang = "DELETE FROM donhang WHERE ID_DH = '$ID_DH_to_delete'";
                                        if (mysqli_query($ketnoi, $query_delete_donhang)) {
                                            echo '<script>';
                                            echo 'alert("Xóa đơn hàng thành công");';
                                            echo "window.location ='order.php';";
                                            echo '</script>';
                                        } else {
                                            echo 'Lỗi MySQL khi xóa đơn hàng: ' . mysqli_error($ketnoi);
                                        }
                                    } else {
                                        echo 'Lỗi MySQL khi xóa chi tiết đơn hàng: ' . mysqli_error($ketnoi);
                                    }
                                }

                                if ($ketqua->num_rows > 0) {
                                    while ($row = $ketqua->fetch_assoc()) {
                                        echo "<tr class='order-line-text'>";
                                        echo "<td class='order-line-content'>" . $row["ID_DH"] . "</td>";
                                        echo "<td class='order-line-content'>" . $row["ID_KH"] . "</td>";
                                        echo "<td class='order-line-content'>" . $row["NGAYDAT"] . "</td>";
                                        echo "<td class='order-line-content'>" . $row["THANHTOAN"] . "</td>";
                                        echo "<td class='order-line-content'>" . $row["TINHTRANG"] . "</td>";
                                        echo "<td class='order-line-content'>";
                                        echo '<a href="./detail_order.php?ID_DH=' . $row['ID_DH'] . '"><i class="fa-solid fa-eye"></i></a>';
                                        echo '<a href="./fixorder.php?ID_DH=' . $row['ID_DH'] . '"><i class="fa-regular fa-pen-to-square ad-product-icon"></i></a>';
                                        echo '<form method="post" action="">';
                                        echo '<input type="hidden" name="delete_donhang" value="' . $row['ID_DH'] . '">';
                                        echo '<button type="submit" name="delete_button" value="' . $row['ID_DH'] . '"><i class="fa-solid fa-trash-can ad-product-icon"></i></button>';
                                        echo '</form>';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Không có dữ liệu đơn hàng.";
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
