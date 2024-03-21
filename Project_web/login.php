<?php
include("ketnoi.php");
session_start();

if ($ketnoi->connect_error) {
    die("Kết nối thất bại: " . $ketnoi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM khachhang WHERE USER_KH = '$user' AND MATKHAU_KH = '$pass'";
    $ketqua = $ketnoi->query($sql);

    if ($ketqua->num_rows > 0) {
        $row = $ketqua->fetch_assoc();
    $_SESSION['loggedin'] = true;
    $_SESSION['ID_KH'] = $row['ID_KH'];

    // Chuyển hướng người dùng đến trang đã lưu hoặc index.php nếu không có trang nào được lưu
    $redirect_page = isset($_SESSION['last_page']) ? $_SESSION['last_page'] : 'index.php';
    header("Location: $redirect_page");
    exit();
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}

$ketnoi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            float: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #1e87d6;
        }
    </style>
    <!-- Thêm các thẻ CSS hoặc các đoạn mã khác nếu cần -->
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h2>Login</h2>
        <label for="username">User:</label>
        <input type="text" id="user" name="user" required>

        <label for="password">Password:</label>
        <input type="password" id="pass" name="pass" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
