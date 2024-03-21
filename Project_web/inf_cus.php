<?php
include("ketnoi.php");
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: login.php");
    exit();
}

// Lấy thông tin khách hàng từ SESSION
$khachhang_id = $_SESSION['ID_KH'];

// Truy vấn để lấy thông tin người dùng từ bảng khachhang
$sql = "SELECT * FROM khachhang WHERE ID_KH = ?";
$stmt = $ketnoi->prepare($sql);
$stmt->bind_param("i", $khachhang_id);
$stmt->execute();
$ketqua = $stmt->get_result();

// Lấy thông tin người dùng
if ($ketqua->num_rows > 0) {
    $nguoidung = $ketqua->fetch_assoc();
} else {
    // Xử lý trường hợp không tìm thấy thông tin người dùng
    echo "Không tìm thấy thông tin người dùng.";
    exit();
}

// Xử lý cập nhật thông tin người dùng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_kh = $_POST["ten_kh"];
    $sdt_kh = $_POST["sdt_kh"];
    $diachi = $_POST["diachi"];

    // Truy vấn để cập nhật thông tin người dùng
    $update_sql = "UPDATE khachhang SET TEN_KH = ?, SDT_KH = ?, DIACHI = ? WHERE ID_KH = ?";
    $update_stmt = $ketnoi->prepare($update_sql);
    $update_stmt->bind_param("sssi", $ten_kh, $sdt_kh, $diachi, $khachhang_id);

    if ($update_stmt->execute()) {
        // Cập nhật thành công, cập nhật lại thông tin người dùng
        $nguoidung['TEN_KH'] = $ten_kh;
        $nguoidung['SDT_KH'] = $sdt_kh;
        $nguoidung['DIACHI'] = $diachi;
        echo '<script>';
            echo 'alert("Update success!");';
            echo "window.location ='inf_cus.php';";
            echo '</script>';
    } else {
        // Xử lý lỗi cập nhật
        echo "Lỗi cập nhật thông tin người dùng: " . $update_stmt->error;
    }

    // Đóng kết nối
    $update_stmt->close();
}

// Đóng kết nối
$stmt->close();
$ketnoi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.profile-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}

h2 {
    color: #007bff;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #495057;
    float: left;
    padding-left: 8px;
}

.info {
    margin-bottom: 20px;
    color: #6c757d;
}

input {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 6px;
}

button {
    background-color: #007bff;
    color: #ffffff;
    padding: 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    width: calc(100% - 20px);
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="profile-container">
        <h2>User Profile</h2>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="info">
                <label for="username">Username:</label>
                <?php echo $nguoidung['USER_KH']; ?>
            </div>

            <label for="ten_kh">Full Name:</label>
            <input type="text" id="ten_kh" name="ten_kh" value="<?php echo $nguoidung['TEN_KH']; ?>" required>

            <label for="sdt_kh">Phone Number:</label>
            <input type="text" id="sdt_kh" name="sdt_kh" value="<?php echo $nguoidung['SDT_KH']; ?>" required>

            <label for="diachi">Address:</label>
            <input type="text" id="diachi" name="diachi" value="<?php echo $nguoidung['DIACHI']; ?>" required>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
