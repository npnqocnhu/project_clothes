<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá sản phẩm</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.rating-form {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

label {
    display: block;
    margin-bottom: 10px;
}

textarea {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 20px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<?php
session_start();

include("ketnoi.php");

if (isset($_SESSION['ID_KH'])) {
    $id_kh = $_SESSION['ID_KH'];

    if (isset($_GET['id'])) {
        $id_sp = mysqli_real_escape_string($ketnoi, $_GET['id']);
?>
        <div class="rating-form">
            <h2>Đánh giá sản phẩm</h2>
            <form method="POST" action="process_rating.php">
                <input type="hidden" name="id_sp" value="<?php echo $id_sp; ?>">
                <input type="hidden" name="id_kh" value="<?php echo $id_kh; ?>">

                <label for="rating">Đánh giá:</label>
                <textarea id="rating" name="noi_dung" rows="4" required></textarea>

                <button type="submit" name="submit_rating">Gửi đánh giá</button>
            </form>
        </div>
<?php
    } else {
        echo "Không có ID sản phẩm được cung cấp.";
    }
} else {
    echo "Vui lòng đăng nhập để đánh giá sản phẩm.";
}
?>
</body>
</html>
