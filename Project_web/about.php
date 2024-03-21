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
    <link rel="stylesheet" href="./asset/css/about.css">
    <link rel="stylesheet" href="./asset/css/modal.css">
    <title>About</title>
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
        <div class="main_header">
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
                            <a href="#" class="header__nav-item-menu">
                                About
                            </a>  
                        </li>
                       <li class="header__nav-item menu-open">
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
                                        <a href="" class="header-product-item">Blazer</a>
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
                                        <a href="" class="header-product-item">Ring</a>
                                        
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
                                </div>
                            </div>  
                        </li>              
                    </ul>
    
                    <!-- <ul class="header__nav-list search">
                        <li class="header-search">
                            <form class="header-search-form" action="/search" method="GET">
                                <input type="text" name="q" placeholder="Search..." class="input-search" required> 
                                <button class="header-search-btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </li>
                    </ul>                 -->
                    
    
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
                                                    <li><a href="./cus_order.php">Order</a></li>
                                                    <li><a href="./inf_cus.php">Personal information</a></li>
                                                    <li><a href="./logout.php">Đăng xuất</a></li>
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

        <div class="container">
            <div class="page">
                <span>Home ></span>
                <span>About</span>
            </div>

            <div class="fashion">
                <h3 class="fashion-title-large">About KINGDOM Fashion</h3>
                <p class="fashion-time"><i class="fa-regular fa-clock"></i> 23:14 - 04/10/2023</p></br>
            </div>

            <div class="fashion">
                <p class="fashion-text">Welcome to KINGDOM Fashion - Where Beauty Transcends Time!</p>
            </div>

            <div class="fashion">
                <h3 class="fashion-title">Introduction</h3>
                <p class="fashion-text">At KINGDOM Fashion, we're not just a clothing store; we're a celebration of style, an embodiment of creativity, and a testament to confidence. Our brand is a reflection of the confluence of modern trends and the enduring charm of traditional fashion.</p>
            </div>

            <div class="fashion">
                <h3 class="fashion-title">Our Mission</h3>
                <p class="fashion-text">Our vision is to inspire and empower individuals to express themselves through fashion. We believe that clothing goes beyond covering your body; it's a canvas for self-expression and a statement of individuality. We envision a world where fashion isn't just about what you wear but how it makes you feel.</p>
            </div>

            <div class="fashion">
                <h3 class="fashion-title">Diverse Styles</h3>
                <p class="fashion-text">KINGDOM is your ultimate fashion destination, offering an extensive range of styles that cater to every facet of your life. From everyday casual wear that effortlessly blends comfort and style to exquisitely crafted outfits designed to make your special moments truly memorable, we've got you covered. Our collections are in a constant state of evolution, keeping pace with the dynamic fashion landscape. Our in-house designers work diligently to create exclusive designs that reflect the unique preferences and aspirations of our discerning clientele.</p>
            </div>

            <div class="fashion">
                <h3 class="fashion-title">Quality & Dedication</h3>
                <p class="fashion-text">Quality is the cornerstone of our existence. Every KINGDOM Fashion product is meticulously crafted with unwavering attention to detail. Our garments undergo rigorous quality checks to ensure that you receive nothing but the finest. Beyond this, our commitment extends to providing unparalleled customer service. Your satisfaction is our priority, and our dedicated team is always ready to listen to your needs and exceed your expectations.</p>
            </div>

            <div class="fashion">
                <h3 class="fashion-title">Join Us in Crafting Your Fashion Story</h3>
                <p class="fashion-text">Thank you for choosing KINGDOM Fashion as your fashion partner. Join us on an exhilarating journey where you can discover and celebrate your authentic style. Whether you're looking for a complete wardrobe makeover or that one perfect piece to elevate your look, we're here to make your fashion dreams a reality.</p>
            </div>

            <div class="fashion">
                <h3 class="fashion-title title-end">KINGDOM Fashion - Where Beauty Meets Fashion</h3>
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
            </div>
        </div>    
    </div>
    
</body>
</html>