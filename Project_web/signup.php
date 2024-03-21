<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/signup.css">
    <title>Signup</title>
</head>
<body>
    

    <div class="signup-container">
        <h2 class="signup-heading">Signup</h2>
        <form method="POST" action="signup.php" onsubmit="return validateForm()">
            <div class="signup-form-group">
                <label class="signup-label" for="username">User Name:</label>
                <input class="signup-input" type="text" id="username" name="username" required>
            </div>
            <div class="signup-form-group">
                <label class="signup-label" for="full-name">Full Name:</label>
                <input class="signup-input" type="text" id="full-name" name="fullname" required>
            </div>
            <div class="signup-form-group">
                <label class="signup-label" for="phone">Phone Number:</label>
                <input class="signup-input" type="tel" id="phone" name="phone" required>
            </div>
            <div class="signup-form-group">
                <label class="signup-label" for="address">Address:</label>
                <input class="signup-input" type="text" id="address" name="address" required>
            </div>
            <div class="signup-form-group">
                <label class="signup-label" for="password">Pass Word:</label>
                <input class="signup-input" type="password" id="password" name="password" required>
            </div>
            <div class="signup-form-group">
                <label class="signup-label" for="confirm-password">Confirm Password:</label>
                <input class="signup-input" type="password" id="confirm-password" name="confirm-password" required>
                <p class="error-message" id="password-error"></p>
            </div>
            <div class="signup-form-group">
                <button class="signup-button" type="submit" name="add_customer">Sign Up</button>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_customer'])) {
        // Kết nối tới cơ sở dữ liệu
        include("ketnoi.php");

        if ($ketnoi->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $ketnoi->connect_error);
        }

        // $customer_id = $_POST['customer_id'];
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        // Thêm khách hàng vào cơ sở dữ liệu
        $query = "INSERT INTO khachhang (TEN_KH, SDT_KH, DIACHI, USER_KH, MATKHAU_KH) VALUES ('$username', '$fullname', '$phone', '$address', '$password')";

        if (mysqli_query($ketnoi, $query)) {
            echo '<script>';
            echo 'alert("Thêm khách hàng thành công");';
            echo "window.location ='index.php';";
            echo '</script>';
        } else {
            $ketqua = "Thêm khách hàng thất bại!" . mysqli_error($ketnoi);
        }

        // Đóng kết nối cơ sở dữ liệu
        $ketnoi->close();
    }
    ?>

        <script>
            function validateForm() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirm-password").value;
                var errorMessage = document.getElementById("password-error");

                if (password !== confirmPassword) {
                    errorMessage.innerHTML = "Passwords do not match!";
                    return false; // Prevent form submission
                } else {
                    errorMessage.innerHTML = ""; // Clear error message
                    return true; // Allow form submission
                }
            }
        </script>
    </div>
</body>
</html>
