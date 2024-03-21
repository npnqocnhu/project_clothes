<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/order1.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Add Order</title>
</head>
<body>
    <?php
    include("ketnoi.php");

    // Thực hiện truy vấn SQL để lấy dữ liệu từ bảng khachhang
    $query_khachhang = "SELECT ID_KH, TEN_KH FROM khachhang";
    $result_khachhang = mysqli_query($ketnoi, $query_khachhang);
    ?>

    <!-- Đoạn code PHP để lấy dữ liệu từ bảng sanpham -->
    <?php
    // Thực hiện truy vấn SQL để lấy dữ liệu từ bảng sanpham
    $query_sanpham = "SELECT ID_SP, TEN_SP FROM sanpham";
    $result_sanpham = mysqli_query($ketnoi, $query_sanpham);
    ?>
    <div class="addorder">
        <h3 class="addorder-title">Add Order</h3>
        <form method="POST" action="addorder.php">
            <div class="addorder-container">
                <div class="addorder-container_box">
                    <div class="addorder-content">
                        <h4 class="addorder-title-h4">Customer</h4>
                        <div class="addorder-line">
                            <p class="addorder-text">ID_KH</p>
                            <select class="add-order-select" name="ID_KH" id="customerSelect">
                                <?php
                                    while ($row_khachhang = mysqli_fetch_assoc($result_khachhang)) {
                                        echo "<option value='" . $row_khachhang['ID_KH'] . "'>" . $row_khachhang['ID_KH'] . " - " . $row_khachhang['TEN_KH'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div> 
                        <div class="addorder-line">
                            <p class="addorder-text">Name</p>
                            <input type="text" class="addorder-input" id="cusNameInput" name="TEN_KH" required>
                        </div> 
                        <div class="addorder-line">
                            <p class="addorder-text">Address</p>
                            <input type="text" class="addorder-input" id="addressInput" name="DIACHI" required>
                        </div> 
                        <div class="addorder-line">
                            <p class="addorder-text">Phone</p>
                            <input type="text" class="addorder-input" id="PhoneInput" name="SDT_KH" required>
                        </div>    
                    </div> 
        
                    <div class="addorder-content addorder-border">
                        <h4 class="addorder-title-h4">Product</h4>
                        
                        <div class="addorder-line-container">
                            <div class="addorder-line">
                                <p class="addorder-text">ID_SP</p>
                                <select class="addorder-select" name="ID_SP" id="productSelect">
                                    <?php
                                        while ($row_sanpham = mysqli_fetch_assoc($result_sanpham)) {
                                            echo "<option value='{$row_sanpham['ID_SP']}'>{$row_sanpham['ID_SP']}</option>";
                                        }
                                    ?>
                                </select>
                            </div> 
                            <div class="addorder-line addorder-line-wight">
                                <p class="addorder-text">Name</p>
                                <input type="text" class="addorder-input" id="productNameInput" name="TEN_SP" readonly required>
                            </div>
                        </div>     
                            
                        <div class="addorder-line-container">
                            <div class="addorder-line">
                                <p class="addorder-text">Quantity</p>
                                <input type="number" class="addorder-input" id="soLuong" name="SOLUONG" required>
                            </div> 

                            <div class="addorder-line">
                                <p class="addorder-text">Price</p>
                                <input type="number" class="addorder-input" id="gia" name="GIA" required>
                            </div> 
                        </div>  

                        <div class="addorder-line">
                            <p class="addorder-text">Date</p>
                            <input type="date" class="addorder-input" name="NGAYDAT" required>
                        </div>

                    <!-- <input type="hidden" id="giaSanPham" name="GIA" required> -->

                        <div class="addorder-line">
                            <p class="addorder-text">Status</p>
                            <select class="addorder-select" name="TINHTRANG" required>
                                <option value="Delivering">Delivering</option>
                                <option value="Wait for confirmation">Wait for confirmation</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                        </div>      
                    </div>
                </div>
            </div>
            <div class="addorder_total">
                <button class="addorder-btn-add" name="add_order">ADD</button>
            </div>
            <div class="addorder_total">
                <p class="addorder_total-text">Total</p>
                <input type="number" class="addorder_total-input" id="totalThanhToan" name="THANHTOAN" readonly>
            </div>
        </form>
    </div>

    <?php
include("ketnoi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_order'])) {
    // Lấy thông tin từ form
    $TEN_KH = mysqli_real_escape_string($ketnoi, $_POST['TEN_KH']);
    $SDT_KH = mysqli_real_escape_string($ketnoi, $_POST['SDT_KH']);
    $DIACHI = mysqli_real_escape_string($ketnoi, $_POST['DIACHI']);
    $ID_SP = mysqli_real_escape_string($ketnoi, $_POST['ID_SP']);
    $TEN_SP = mysqli_real_escape_string($ketnoi, $_POST['TEN_SP']);
    $SOLUONG = mysqli_real_escape_string($ketnoi, $_POST['SOLUONG']);
    $gia = mysqli_real_escape_string($ketnoi, $_POST['GIA']);
    $NGAYDAT = mysqli_real_escape_string($ketnoi, $_POST['NGAYDAT']);
    $THANHTOAN = mysqli_real_escape_string($ketnoi, $_POST['THANHTOAN']);
    $TINHTRANG = mysqli_real_escape_string($ketnoi, $_POST['TINHTRANG']);

    // Tạo chuỗi ngẫu nhiên 6 chữ số cho ID_CT và ID_DH
    $ID_CT = sprintf('%06d', mt_rand(0, 999999));
    $ID_DH = sprintf('%06d', mt_rand(0, 999999));

    // Kiểm tra sự tồn tại của khách hàng
    $query_check_customer = "SELECT ID_KH FROM khachhang WHERE TEN_KH = '$TEN_KH' AND SDT_KH = '$SDT_KH'";
    $result_check_customer = mysqli_query($ketnoi, $query_check_customer);

    if ($result_check_customer && mysqli_num_rows($result_check_customer) > 0) {
        // Khách hàng đã tồn tại, lấy ID_KH từ kết quả truy vấn
        $row_customer = mysqli_fetch_assoc($result_check_customer);
        $ID_KH = $row_customer['ID_KH'];
    } else {
        // Khách hàng chưa tồn tại, thêm mới vào bảng khachhang
        $query_add_customer = "INSERT INTO khachhang (TEN_KH, SDT_KH, DIACHI) VALUES ('$TEN_KH', '$SDT_KH', '$DIACHI')";
        mysqli_query($ketnoi, $query_add_customer);

        // Lấy ID_KH mới thêm vào
        $ID_KH = mysqli_insert_id($ketnoi);
    }

    // Thêm đơn hàng vào bảng donhang
    $query_add_donhang = "INSERT INTO donhang (ID_DH, ID_KH, NGAYDAT, THANHTOAN, TINHTRANG) 
                        VALUES ('$ID_DH', '$ID_KH', '$NGAYDAT', '$THANHTOAN', '$TINHTRANG')";

    if (mysqli_query($ketnoi, $query_add_donhang)) {
        // Lấy ID_DH mới thêm vào
        // $ID_DH = mysqli_insert_id($ketnoi);

        // Thêm chi tiết đơn hàng vào bảng ct_donhang
        $query_add_order = "INSERT INTO ct_donhang (ID_CT, ID_DH, ID_KH, ID_SP, TEN_KH, DIACHI, SDT_KH,  TEN_SP, SOLUONG, GIA, NGAYDAT, THANHTOAN, TINHTRANG) 
                            VALUES ('$ID_CT', '$ID_DH', '$ID_KH', '$ID_SP', '$TEN_KH', '$DIACHI','$SDT_KH', '$TEN_SP', '$SOLUONG', '$gia', '$NGAYDAT', '$THANHTOAN', '$TINHTRANG')";
        if (mysqli_query($ketnoi, $query_add_order)) {
            echo '<script>';
            echo 'alert("Thêm đơn hàng thành công");';
            echo "window.location ='order.php';";
            echo '</script>';
        } else {
            echo "Lỗi MySQL: " . mysqli_error($ketnoi);
        }
    } else {
        echo "Lỗi MySQL: " . mysqli_error($ketnoi);
    }

    // Đóng kết nối cơ sở dữ liệu
    $ketnoi->close();
}
?>





<script>
    $(document).ready(function () {
    // Bắt sự kiện khi giá trị của select box thay đổi
    $('#customerSelect').change(function () {
        var selectedCustomerId = $(this).val();

        // Gửi yêu cầu Ajax để lấy thông tin khách hàng
        $.ajax({
            type: 'POST',
            url: 'order1.php', // Đổi thành đường dẫn của file xử lý Ajax
            data: { ID_KH: selectedCustomerId },
            success: function (response) {
                // Parse JSON từ phản hồi
                var customerInfo = JSON.parse(response);

                // Hiển thị thông tin khách hàng trong các ô input
                $('#cusNameInput').val(customerInfo.TEN_KH);
                $('#addressInput').val(customerInfo.DIACHI);
                $('#PhoneInput').val(customerInfo.SDT_KH);
            }
        });
    });
});


    $(document).ready(function () {
        $('#productSelect').change(function () {
            var selectedProductId = $(this).val();

            // Gửi yêu cầu Ajax để lấy tên sản phẩm
            $.ajax({
                type: 'POST',
                url: 'order1.php', // Đổi thành đường dẫn của file xử lý Ajax
                data: { ID_SP: selectedProductId },
                success: function (response) {
                    // Hiển thị tên sản phẩm trong input
                    $('#productNameInput').val(response);
                }
            });
        });
    });

    $(document).ready(function () {
    // Bắt sự kiện khi giá trị của select box thay đổi
    $('#productSelect').change(function () {
        var selectedProductId = $(this).val();

        // Gửi yêu cầu Ajax để lấy giá sản phẩm
        $.ajax({
            type: 'POST',
            url: 'order2.php',
            data: { ID_SP: selectedProductId },
            success: function (response) {
                // Hiển thị giá sản phẩm trong input
                $('#gia').val(response);

                // Tính tổng thanh toán khi số lượng thay đổi
                calculateTotal();
            }
        });
    });

    // Bắt sự kiện khi số lượng thay đổi
    $('#soLuong').change(function () {
        // Tính tổng thanh toán khi số lượng thay đổi
        calculateTotal();
    });

    function calculateTotal() {
        var gia = parseFloat($('#gia').val());
        var soLuong = parseInt($('#soLuong').val());

        // Kiểm tra xem giá và số lượng có phải là số hợp lệ không
        if (!isNaN(gia) && !isNaN(soLuong)) {
            var total = gia * soLuong;

            // Hiển thị tổng thanh toán trong input (chắc chắn rằng bạn có một ô input với id là 'totalThanhToan')
            $('#totalThanhToan').val(total.toFixed(2));
        }
    }
});

</script>
</body>
</html>