<?php
session_start();
$_SESSION['last_page'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kanit:wght@500&family=Quicksand:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/clothes.css">
    <title>Document</title>
    <style>
        .header-login-user-icon:hover .header-login-user{
            display: block;
        }

        .header-login-user{
            position: absolute;
            display: none;
            width: 120px;
            text-align: center;
            font-size: 1.4rem;
            padding:8px;
            background-color:#fff ;
            box-shadow: 3px 5px 6px #ccc;
            border-radius: 3px;
        }

        .header-login-user li{
            background-color: #fff;
            color: #000;
        }

        .header-login-user a{
            text-decoration: none;
            color: #000;
        }

        .header-login-cover {
            display: flex;
            flex-direction: row;
        }

        .header__nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        }

        .header__nav-item {
            margin: 0 10px;
        }

        .header-cover-list-login {
            display: flex;
            align-items: center;
        }

        .header-login-cover {
            position: relative;
        }

        .header-login-user-icon {
            display: flex;
            align-items: center;
        }

        .header-login-user {
            width: 200px;
            list-style: none;
            padding: 0;
            margin: 0;
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .header-login-user-icon:hover .header-login-user {
            display: block;
        }

        .header-login-user a {
            display: block;
            text-decoration: none;
            /* color: #fff; */
            padding: 5px;
        }

        .header-login-user a:hover {
            background-color: #f0f0f0;
            /* color: #fff; */
        }

        .header-cover-list-sign-up {
            display: flex;
            align-items: center;
        }

        .header__nav-item-menu {
            text-decoration: none;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
        }

        .header__nav-item-menu:hover {
            /* background-color: #f0f0f0; */
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="main">
        <div class="main-header">
            <div class="hotline">
                <ul class="hotline-call">
                    <li>Hotline: +000 999 999</li>
                </ul>
                <ul class="hotline-call">
                    <li>
                        <a href="" class="hotline-link"><i class="fa-brands fa-facebook"></i></a>
                    </li>
    
                    <li>
                        <a href="" class="hotline-link"><i class="fa-brands fa-instagram"></i></a>
                    </li>
    
                    <li>
                        <a href="" class="hotline-link"><i class="fa-brands fa-tiktok"></i></a>
                    </li>
    
                    <li>
                        <a href="" class="hotline-link"><i class="fa-brands fa-twitter"></i></a>
                        
                </ul>
            </div>
            <div class="main_header">
                <div class="header">
                    <nav class="header__nav">
                        <ul class="header__nav-list">
                            <span class="header__nav-logo">
                                <span class="header__nav-logo-text">KINGDOM</span>
                            </span>  
                            <li class="header__nav-item">
                                <a href="./index.php" class="header__nav-item-menu">
                                    Home
                                </a>  
                            </li>
                            <li class="header__nav-item">
                                <a href="./about.php" class="header__nav-item-menu">
                                    About
                                </a>  
                            </li>
                            <!-- <li class="header__nav-item menu-open">
                                <a href="" class="header__nav-item-menu">
                                    Product
                                </a>
                                <div class="header__nav-item-product">
                                    <div class="grid__column-2-4">
                                        <span href="" class="header__nav-product-link">Clothes</span>
                                        <div class="product-link-item">
                                            <a href="" class="header-product-item">T-shirt</a>
                                            <a href="" class="header-product-item">Shirt</a>
                                            <a href="" class="header-product-item">Vest</a>
                                        </div>
                                    </div>
                                    
                                    <div class="grid__column-2-4">
                                        <a href="" class="header__nav-product-link">Trousers</a>
                                        <div class="product-link-item">
                                            <a href="" class="header-product-item">Jeans</a>
                                            <a href="" class="header-product-item">Dress pants</a>
                                            <a href="" class="header-product-item">Cargo pants</a>
                                        </div>
                                    </div>
        
                                    <div class="grid__column-2-4">
                                        <a href="" class="header__nav-product-link">Accessories</a>
                                        <div class="product-link-item">
                                           
                                            <a href="" class="header-product-item">Handbag</a>
                                            <a href="" class="header-product-item">Watch</a>
                                            <a href="" class="header-product-item">Hat</a>
                                            
                                        </div>
                                    </div>
        
                                    <div class="grid__column-2-4">
                                        <a href="" class="header__nav-product-link">Shoes</a>
                                        <div class="product-link-item">
                                            <a href="" class="header-product-item">Sneakers</a>
                                            <a href="" class="header-product-item">Boots</a>
                                            <a href="" class="header-product-item">Dress shoes</a>
                                        </div>
                                    </div>
        
                                    <div class="grid__column-2-4">
                                        <img src="./asset/img/product_all.jpg" alt="" class="product-style">
                                        <!-- <a class="product_all">Shop all</a> -->
                                    <!-- </div>
                                </div>  
                            </li>  -->
                            <!-- <li class="header__nav-item">
                                <a href="" class="header__nav-item-menu">
                                    Contact
                                </a>
                            </li>                   -->
                        </ul>
        
                        <ul class="header__nav-list list-one">
                        <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            // Nếu đã đăng nhập, hiển thị nội dung sau khi đăng nhập
                            echo '<li class="header__nav-item header-cover-list-login" id="loginSection">
                                    <div class="header-login-cover">
                                        <div class="header-login-user-icon">
                                            <span style="font-size: 26px;">
                                                Xin chào, <i class="fa-solid fa-user icon-right"></i>
                                            </span>
                                            <ul class="header-login-user">
                                                <li><a href="./cus_order.php"><i class="fa-solid fa-truck"></i> Order</a></li>
                                                <li><a href="./inf_cus.php"><i class="fa-solid fa-user"></i> Personal information</a></li>
                                                <li><a href="./view_cart.php"><i class="fa-solid fa-bag-shopping"></i>  Cart</a></li>
                                                <li><a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>';
                        } else {
                            // Nếu chưa đăng nhập, hiển thị form đăng nhập và đăng ký
                            echo '<div class="header-cover-list-sign-up" id="loggedInSection">
                                    <li class="header__nav-item list-two">
                                        <a href="./login.php" class="header__nav-item-menu" id="openLoginButton">Log in</a>
                                    </li>
                                    <li class="header__nav-item">
                                        <a href="./signup.php" class="header__nav-item-menu" id="openSignUpButton">Sign up</a>
                                    </li>
                                </div>';
                        }
                        ?>
                    </ul>
                    </nav>
                </div> 
            </div>
        </div>
    
        <div class="container">
            <div class="page">
                <span>Home ></span>
                <span>Clothes</span>
            </div>
        </div>

        <div class="main__clothes">
            <div class="grid-column-10">
                <div class="home-filter">
                    <span class="home-filter-title">Products</span>
                    <ul class="header__nav-list search">
                        <li class="header-search">
                            <form class="header-search-form" action="" method="GET">
                                <input type="text" name="q" placeholder="Search..." class="input-search" required> 
                                <button type="submit" class="header-search-btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </li>
                    </ul> 
                </div>

                <div class="home-product">
                    <div class="grid-row">
                        <?php
                        include('ketnoi.php');

                        // Check if the search query parameter is set
                        if (isset($_GET['q'])) {
                            $search_query = mysqli_real_escape_string($ketnoi, $_GET['q']);

                            // Modify the SQL query to include the search functionality
                            $sql = "SELECT sanpham.*, danhmucsanpham.TEN_DM 
                                    FROM sanpham 
                                    INNER JOIN danhmucsanpham ON sanpham.ID_DM = danhmucsanpham.ID_DM
                                    WHERE sanpham.TEN_SP LIKE '%$search_query%' OR danhmucsanpham.TEN_DM LIKE '%$search_query%'";
                        } else {
                            // Default query without search
                            $sql = "SELECT sanpham.*, danhmucsanpham.TEN_DM FROM sanpham INNER JOIN danhmucsanpham ON sanpham.ID_DM = danhmucsanpham.ID_DM";
                        }

                        $ketqua = mysqli_query($ketnoi, $sql);
                
                        // Kiểm tra kết quả truy vấn và hiển thị sản phẩm
                        if ($ketqua->num_rows > 0) {
                            while ($row = $ketqua->fetch_assoc()) {
                                echo '<div class="home-product-item">';
                                echo '<a href="infproduct.php?id=' . $row['ID_SP'] . '" class="home-product-item__link">'; // Thêm ID_SP vào URL
                                echo '<img src="./asset/img/shirt/' . $row['ANH_SP'] . '" alt="" class="home-product-item__img">';
                                echo '<div class="home-product-text">';
                                echo '<h4 class="home-product-item__name">' . $row['TEN_DM'] . ': </h4>';
                                echo '<p class="home-product-item__name" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">' . $row['TEN_SP'] . '</p>';
                                echo '<div class="home-product__price-cover">';
                                echo '<div class="home-product-item__price">';
                                echo '<span class="home-product-item__price-old">Was: $' . $row['GIACU_SP'] . '</span><br>';
                                echo '<span class="home-product-item__price-current">Now: $' . $row['GIA'] . '</span>';
                                echo '</div>';
                                // echo '<div class="home-product-item-pay">';
                                // echo '<i class="fa-solid fa-cart-shopping"></i>';
                                // echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</a>';
                                echo '</div>';
                            }
                        } else {
                            echo "Không có sản phẩm nào.";
                        }
                        ?>
                    </div>
                </div>                
            </div>
        </div>

        <div class="footer">
            <div class="footer-container">
                <div class=".grid__column-2-4">
                    <h3 class="footer-title">
                        Contact
                    </h3>

                    <div class="footer-column-text text-addess">
                        <p class="footer-text">
                            We are a leading fashion brand committed to bringing you uniqueness and sophistication in every product.
                        </p>
    
                        <p class="footer-text">
                            <i class="fa-solid fa-location-dot"></i>32 Võ Văn Dũng, Đống Đa, Hà Nội
                        </p>
    
                        <p class="footer-text">
                            <i class="fa-solid fa-phone"></i></i>+000 999 999
                        </p>
    
                        <p class="footer-text">
                            <i class="fa-solid fa-envelope"></i>abcdef@gmail.com
                        </p>
    
                        <p class="footer-text">
                            <i class="fa-brands fa-facebook"></i>https://www.facebook.com
                        </p>
                    </div>   
                </div>

                <div class=".grid__column-2-4">
                    <h3 class="footer-title ">
                        Transport
                    </h3>

                    <div class="footer-column-text">
                        <img src="./asset/img/ghn.jfif" alt="" class="footer-text-img">
    
                        <img src="./asset/img/ghtk.png" alt="" class="footer-text-img">
    
                        <img src="./asset/img/j&t.png" alt="" class="footer-text-img">

                        <img src="./asset/img/grap.png" alt="" class="footer-text-img">

                        <img src="./asset/img/vnpost.png" alt="" class="footer-text-img">
                    </div>
                    
                    <h3 class="footer-title">
                        Pay
                    </h3>

                    <div class="footer-column-text">
                        <img src="./asset/img/american.png" alt="" class="footer-text-img">
    
                        <img src="./asset/img/cod.png" alt="" class="footer-text-img">
    
                        <img src="./asset/img/visa.png" alt="" class="footer-text-img">

                        <img src="./asset/img/ahamove.png" alt="" class="footer-text-img">

                        <img src="./asset/img/tworing.png" alt="" class="footer-text-img">
                    </div> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>