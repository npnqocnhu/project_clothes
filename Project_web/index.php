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
    <!-- <link rel="stylesheet" href="./asset/font/Quentin.otf"> -->
    <link rel="stylesheet" href="./asset/css/base.css">  
    <link rel="stylesheet" href="./asset/css/modal.css">
    <title>KingDom</title>
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
                                <a href="" class="header__nav-item-menu">
                                    Home
                                </a>  
                            </li>
                            <li class="header__nav-item">
                                <a href="./about.php" class="header__nav-item-menu">
                                    About
                                </a>  
                            </li>
                            <!-- <li class="header__nav-item">
                                <a href="./contact.php" class="header__nav-item-menu">
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
                                                    Hello, <i class="fa-solid fa-user icon-right"></i>
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
        <div id="slider">
            <img src="./asset/img/nen.jpg" alt="" class="slider-img">
            <div class="slider-cover">
                <h3 class="slider-header">
                    KINGDOM
                </h3>
                <p class="slider-text">
                    Embarking on a Stylish Journey Through Time and Trends: A Celebration of Fashion's Timeless Artistry and Ever-Evolving Elegance
                </p>
            </div>
        </div>

        
        <div id="store">
            <div class="store__header">
                <h3 class="store__header-h3">
                    Elegance and Style
                </h3>

                <p class="store__header-text">
                    Are you ready to explore a world of elegance and style in the realm of fashion? At our website, we take pride in presenting a diverse and unique collection of top-tier fashion products, ranging from clothing, footwear, accessories, to jewelry, enabling you to craft your distinct and standout style for every occasion. We are committed to offering you not only an incredibly varied selection but also unmatched quality, so you can always feel confident and empowered in every fashion trend. Join us and transform each day into your very own, unique fashion showcase!
                </p>
            </div>

            <div class="store__cover">
                <div class="grid__column-3">
                    <div class="store__cover-item">
                        <img src="./asset/img/store/quanao.jpg" alt="" class="store__cover-item-img store-10">
                        <div class="store-cover-img-text">
                            <div class="store-img-text">
                                <h4>Clothes</h4>
                                <a href="./clothes.php" class="store-img-link">
                                    <span>Show</span>
                                </a>
                            </div>
                        </div>           
                    </div>
                </div>

                <div class="grid__column-3">
                    <div class="store__cover-item">
                        <img src="./asset/img/store/giay.jpg" alt="" class="store__cover-item-img">
                        <div class="store-cover-img-text">
                            <div class="store-img-text">
                                <h4>Shoes</h4>
                                <a href="./shoes.php" class="store-img-link">
                                    <span>Show</span>
                                </a>
                            </div>
                        </div>   
                    </div>

                    <a href="./all.php" style="text-decoration: none;">
                        <div class="store__cover-buy">
                            <p class="store__cover-buy-text">BUY ALL</p><i class="fa-solid fa-arrow-right store__cover-buy-icon"></i>
                        </div>
                    </a>
                </div>

                <div class="grid__column-3">
                    <div class="store__cover-item">
                        <img src="./asset/img/store/phukien.jpg" alt="" class="store__cover-item-img">
                        <div class="store-cover-img-text">
                            <div class="store-img-text">
                                <h4>Accessory</h4>
                                <a href="./accessory.php" class="store-img-link">
                                    <span>Show</span>
                                </a>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-container" id="footer-container">
                <!-- Các phần tử đã bị xóa -->
        
                <!-- Sử dụng JavaScript để tải và hiển thị nội dung từ footer.html -->
                <script>
                    function loadFooter() {
                        const footerContainer = document.getElementById('footer-container');
        
                        fetch('footer.php')
                            .then(response => response.text())
                            .then(data => {
                                footerContainer.innerHTML = data;
                            })
                            .catch(error => console.error(error));
                    }
                    loadFooter();
                </script>
                <script>
                    // Giả sử bạn có một hàm xử lý khi người dùng đăng nhập thành công
                    function handleLoginSuccess() {
                        // Ẩn phần đăng nhập
                        document.getElementById('loginSection').style.display = 'none';

                        // Hiển thị phần đã đăng nhập
                        document.getElementById('loggedInSection').style.display = 'block';

                        // Cập nhật thông tin người dùng, ví dụ: username là 'John'
                        document.querySelector('.header-login-user-link').textContent = 'John';
                    }
                </script>

            </div>
        </div>
    </div>
</body>
</html>