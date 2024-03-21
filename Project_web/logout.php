<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Lưu URL trang hiện tại vào session nếu không phải là trang đăng xuất
if (strpos($_SERVER['REQUEST_URI'], 'logout.php') === false) {
    $_SESSION['last_page'] = $_SERVER['REQUEST_URI'];
}

// Hủy toàn bộ session
session_destroy();

// Chuyển hướng về trang đã lưu hoặc trang chủ nếu không có trang nào được lưu
header("Location: " . (isset($_SESSION['last_page']) ? $_SESSION['last_page'] : 'index.php'));
exit();
?>

