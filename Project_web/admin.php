<?php
include("ketnoi.php"); // Bao gồm tệp kết nối đến cơ sở dữ liệu

$error_message = ""; // Biến lưu trữ thông báo lỗi

// Xử lý đăng nhập khi người dùng nhấn nút "Log in"
if (isset($_POST["login"])) {
    // Lấy thông tin từ form đăng nhập
    $ten_ad = $_POST["ten_ad"];
    $matkhau_ad = $_POST["matkhau_ad"];

    // Thực hiện truy vấn kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM admin WHERE ten_ad = '$ten_ad' AND matkhau_ad = '$matkhau_ad'";
    $result = mysqli_query($ketnoi, $sql);

    // Kiểm tra kết quả truy vấn
    if ($result && mysqli_num_rows($result) > 0) {
        // Đăng nhập thành công, chuyển hướng đến trang mainadmin.php
        header("Location: mainadmin.php");
        exit; // Dừng kịch bản để tránh thực thi mã tiếp theo
    } else {
        // Đăng nhập thất bại, thông báo lỗi
        $error_message = "Incorrect name or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/cssbe/admin.css">
    <title>Log in admin</title>
</head>
<body>
    <div class="mainad">
        <div class="mainad__form">
            <h3 class="mainad__form-header">Log in</h3>
            <form method="POST" action="admin.php">
                <div class="mainad__form-cover">
                    <div class="mainad__form__group">
                        <input type="text" class="mainad__form__input" name="ten_ad" placeholder="Username">
                        <span class="mainad__form-icon"><i class="fa-solid fa-user"></i></span>
                    </div>

                    <div class="mainad__form__group">
                        <input type="password" class="mainad__form__input" name="matkhau_ad" placeholder="Password">
                        <span class="mainad__form-icon" ><i class="fa-solid fa-lock"></i></span>
                    </div>

                    <div class="mainad__form-btn-login">
                        <button class="mainad__form-btn_lg" name="login">Log in</button>
                    </div>

                    <?php
                    if (!empty($error_message)) {
                        echo '<div class="mainad__form-error">' . $error_message . '</div>';
                    }
                    ?>

                </div>
            </form>
        </div>
    </div>
</body>
</html>
