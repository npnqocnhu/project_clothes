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
    <link rel="stylesheet" href="./asset/font/Quentin.otf">
    <link rel="stylesheet" href="./asset/css/base.css">
    <link rel="stylesheet" href="./asset/css/contact.css">
    <script src="./asset/javascript/style.js"></script>
    <title>KingDom Watch</title>
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
                            <li class="header__nav-item">
                                <a href="#" class="header__nav-item-menu">
                                    Contact
                                </a>
                            </li>                  
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
        </div>

        <div class="page">
            <span>Home ></span>
            <span>Contact</span>
        </div>    

        <div class="contact-cover">
            <div class="contact-main">
                <div class="contact-cover-main">
                    <img src="./asset/img/contact.jpg" alt="" class="contact-cover-main__img">
                    <div class="contact-cover-main__contact">
                        <h3 class="contact-cover-main-header">What do you need assistance?</h3>
                        <p class="contact-cover-main__text">I'm delighted that you've visited our website. We're always ready to listen to your feedback, suggestions, or any questions you may have. Please don't hesitate to get in touch with us using the form below or through the provided email and phone contact details. We commit to responding to you as soon as possible. Thank you for your interest and support. We look forward to the opportunity to serve you soon!</p>
                        <div class="contact-cover-main__inf">
                            <div class="contact-cover-main__infin mr-10">
                                <p>Name*</p>
                                <input type="text" class="contact-main__input" placeholder="Full Name">
                            </div>
    
                            <div class="contact-cover-main__infin">
                                <p>Email*</p>
                                <input type="text" class="contact-main__input" placeholder="Address Email">
                            </div>
                        </div>
    
                        <div class="contact-cover-main__infin">
                            Content*
                            <input type="text" class="contact-main__input-content" placeholder="Please share about your purchasing experience">
                        </div>
    
                        <div class="contact-cover-main__send">
                            <button class="contact-cover-main__btn" id="send-contact">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("#send-contact").click(function() {
            // Lấy giá trị từ các trường input
            var fullName = $(".contact-main__infin:eq(0) input").val();
            var email = $(".contact-main__infin:eq(1) input").val();
            var content = $(".contact-main__input-content").val();

            // Kiểm tra xem các trường có được nhập đầy đủ không
            if (fullName && email && content) {
                // Gửi dữ liệu lên server để xử lý
                $.post("contact.php", { action: "send_contact", fullName: fullName, email: email, content: content }, function(response) {
                    // Hiển thị thông báo hoặc thực hiện các hành động khác tùy thuộc vào response từ server
                    alert(response);
                });
            } else {
                alert("Vui lòng điền đầy đủ thông tin.");
            }
        });
    });
</script>

<?php
if (session_status() == PHP_SESSION_NONE) {
    // Bắt đầu phiên chỉ khi chưa có phiên nào đang chạy
    session_start();
}
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "send_contact") {
    // Lấy thông tin từ biến POST
    $fullName = mysqli_real_escape_string($ketnoi, $_POST['fullName']);
    $email = mysqli_real_escape_string($ketnoi, $_POST['email']);
    $content = mysqli_real_escape_string($ketnoi, $_POST['content']);

    // Lấy ID_KH từ phiên đăng nhập
    $customer_id = isset($_SESSION['ID_KH']) ? $_SESSION['ID_KH'] : null;

    // Tạo ID_LH ngẫu nhiên
    $randomID = generateRandomID(5);
    $contact_id = "LH" . $randomID;

    // Thực hiện truy vấn để thêm thông tin liên hệ vào cơ sở dữ liệu
    $insert_contact_query = "INSERT INTO lienhe (ID_LH, ID_KH, EMAIL_LH, NOIDUNG) VALUES ('$contact_id', '$customer_id', '$email', '$content')";

    if (mysqli_query($ketnoi, $insert_contact_query)) {
        echo "Thông tin liên hệ đã được gửi thành công!";
    } else {
        echo "Lỗi khi gửi thông tin liên hệ: " . mysqli_error($ketnoi);
    }
}

function generateRandomID($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomID = '';
    for ($i = 0; $i < $length; $i++) {
        $randomID .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomID;
}
?>
</body>
</html>