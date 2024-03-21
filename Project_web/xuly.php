<?php
// Khai báo sử dụng session
session_start();
// Khai báo utf-8 để hiển thị được tiếng Việt
header('Content-Type: text/html; charset=UTF-8');

// Xử lý đăng nhập
if (isset($_POST['dangnhap'])) {
    // Kết nối tới database
    include('ketnoi.php');

    // Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    // Kiểm tra đã nhập đủ tên đăng nhập và mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // Mã hóa password
    $password = md5($password);

    // Kiểm tra tên đăng nhập có tồn tại không
    $query = "SELECT USER_KH, MATKHAU_KH FROM khachhang WHERE USER_KH='$username'";
    $result = mysqli_query($ketnoi, $query) or die(mysqli_error($ketnoi));

    if (!$result) {
        echo "Tên đăng nhập hoặc mật khẩu không đúng!";
    } else {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $row = mysqli_fetch_array($result);

        // So sánh mật khẩu đã mã hóa
        if ($password != $row['MATKHAU_KH']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }

        // Lưu tên đăng nhập vào session
        $_SESSION['username'] = $username;
        echo "Xin chào <b>" . $username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
        die();
    }

    // Đóng kết nối
    mysqli_close($ketnoi);
}
?>
