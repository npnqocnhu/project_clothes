<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/mainadmin1.css">
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
                        <a href="admin.php">Log out</a>
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
                                    <a href="ad_repcmt.php"><li class="ad-header-list-li">Review list</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="grid-8-column">
                        <div class="admin-report-main">
                            <div class="grid-8-2-column">
                                <!-- <div class="admin-main-center">
                                    <div class="admin-content-list__big">
                                        <p class="admin-list__big-text"><i class="fa-solid fa-chart-simple"></i> Statistical</p>
                                    </div>
                                </div> -->
                                <a href="./bill.php" style="text-decoration: none;">
                                    <div class="admin-main-center">
                                        <div class="admin-content-list__big">
                                            <p class="admin-list__big-text"><i class="fa-solid fa-wallet"></i> Bill</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
    
                            <div class="grid-8-2-column">
                                <a href="./detailtheosp.php" style="text-decoration: none;">
                                    <div class="admin-main-center">
                                        <div class="admin-content-list__big">
                                            <p class="admin-list__big-text"><i class="fa-solid fa-clipboard"></i> Report</p>
                                        </div>
                                    </div>
                                </a>
                                <!-- <div class="admin-main-center">
                                    <div class="admin-content-list__big">
                                        <p class="admin-list__big-text"><i class="fa-solid fa-comment"></i> Chat</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>