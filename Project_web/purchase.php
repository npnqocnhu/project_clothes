<?php
include("ketnoi.php");

// Khởi động phiên
session_start();

if ($ketnoi->connect_error) {
    die("Connection failed: " . $ketnoi->connect_error);
}

// Kiểm tra đăng nhập
if(isset($_SESSION['ID_KH'])) {
    // Người dùng đã đăng nhập, lấy ID_KH từ phiên
    $id_kh = $_SESSION['ID_KH'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["customerName"])) {
        // Lấy ngày hiện tại
        $ngaydat = date("Y-m-d");

        // Lấy dữ liệu từ biểu mẫu
        $customerName = $_POST["customerName"];
        $customerAddress = $_POST["customerAddress"];
        $customerPhone = $_POST["customerPhone"];
        // Get the total from the view_cart page
        $totalPayment = $_POST["totalPayment"];

        // Tạo ID_DH với 6 ký tự và số ngẫu nhiên
        $id_dh = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6);

        // Tính toán tổng THANHTOAN cho đơn hàng
        $totalThanhtoan = 0;

        // Chèn dữ liệu vào bảng donhang
        $insertDonHangSQL = "INSERT INTO donhang (ID_DH, ID_KH, NGAYDAT, THANHTOAN, TINHTRANG)
                            VALUES ('$id_dh', '$id_kh', '$ngaydat', '$totalPayment', 'Delivering')";
        $ketnoi->query($insertDonHangSQL);

        // Lặp qua giỏ hàng và tạo một đơn hàng mới cho mỗi sản phẩm
        $sql = "SELECT ID_SP, TEN_SP, SOLUONG, GIA FROM giohang";
        $ketqua = $ketnoi->query($sql);

        while ($row = $ketqua->fetch_assoc()) {
            // Tạo ID_CT với 6 ký tự và số ngẫu nhiên
            $id_ct = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6);

            $id_sp = $row["ID_SP"];
            $ten_sp = $row["TEN_SP"];
            $soluong = $row["SOLUONG"];
            $gia = $row["GIA"];

            // Tính toán THANHTOAN dựa trên SOLUONG và GIA
            $thanhtoan = $soluong * $gia;

            // Trước khi sử dụng trong câu lệnh SQL, xử lý chuỗi
            $ten_sp = preg_replace('/[^\p{L}\p{N}\s]/u', '', $ten_sp);
            $ten_sp_escaped = $ketnoi->real_escape_string($ten_sp);

            // Chèn dữ liệu vào bảng ct_donhang
            $insertCTDonHangSQL = "INSERT INTO ct_donhang (ID_CT, ID_DH, ID_KH, ID_SP, TEN_KH, DIACHI, SDT_KH, TEN_SP, SOLUONG, GIA, NGAYDAT, THANHTOAN, TINHTRANG)
                                  VALUES ('$id_ct', '$id_dh', '$id_kh', '$id_sp', '$customerName', '$customerAddress', '$customerPhone', '$ten_sp_escaped', '$soluong', '$gia', '$ngaydat', '$thanhtoan', 'Delivering')";
            
            $ketquaCT = $ketnoi->query($insertCTDonHangSQL);
            if (!$ketquaCT) {
                die('Query failed: ' . $ketnoi->error);
            }

            // Tính toán tổng THANHTOAN cho đơn hàng
            $totalThanhtoan += $thanhtoan;
        }

        // Update lại THANHTOAN cho đơn hàng sau khi đã tính toán được tổng THANHTOAN
        $updateDonHangSQL = "UPDATE donhang SET THANHTOAN = '$totalThanhtoan' WHERE ID_DH = '$id_dh'";
        $ketnoi->query($updateDonHangSQL);

        $deleteCartSQL = "DELETE FROM giohang";
        $ketnoi->query($deleteCartSQL);

        echo "<div style='text-align: center; padding: 20px; background-color: #4CAF50; color: white;'>";
        echo "Order Success! Thank you for your purchase.";
        echo "</div>";

        // Đóng kết nối cơ sở dữ liệu
        $ketnoi->close();
    }
} else {
    // Người dùng chưa đăng nhập
    header("Location: login.php");
    exit();
}
?>
