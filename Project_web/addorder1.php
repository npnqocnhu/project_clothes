<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/addproduct.css">
    <!-- <link rel="stylesheet" href="./asset/css/toast.css"> -->
    <link rel="stylesheet" href="./asset/css/order.css">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
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
$query_sanpham = "SELECT ID_SP FROM sanpham";
$result_sanpham = mysqli_query($ketnoi, $query_sanpham);
?>
    <div class="add-product-main">
        <div class="add-product-cover">
            <div class="add-product-content">
                <h3 class="add-product-title">
                    Add Order
                </h3>
                <form method="POST" action="addorder.php">
                    <div class="add-order-item">
                        <div class="add-product-line add-order-row">
                            <p class="add-product-text">ID Customer</p>
                            <select class="add-order-select" name="ID_KH">
                            <?php
                                while ($row_khachhang = mysqli_fetch_assoc($result_khachhang)) {
                                    echo "<option value='" . $row_khachhang['ID_KH'] . "'>" . $row_khachhang['ID_KH'] . " - " . $row_khachhang['TEN_KH'] . "</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="add-product-line add-order-row">
                            <p class="add-product-text">ID Product</p>
                            <select class="add-order-select" name="ID_SP" id="productSelect">
                            <?php
                                while ($row_sanpham = mysqli_fetch_assoc($result_sanpham)) {
                                    echo "<option value='{$row_sanpham['ID_SP']}'>{$row_sanpham['ID_SP']}</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="add-product-line input-size-large">
                        <p class="add-product-text">Name Product</p>
                        <input type="text" class="add-product-input" id="productNameInput" name="TEN_SP" readonly>
                    </div>

                    <div class="add-product-line input-size-small">
                        <p class="add-product-text">Quantity</p>
                        <input type="number" class="add-product-input" id="soLuong" name="SOLUONG">
                    </div>
                    
                    <div class="add-product-line input-size-small">
                        <p class="add-product-text">Price</p>
                        <input type="number" class="add-product-input" id="gia" name="GIA">
                    </div> 

                    <div class="add-product-line">
                        <p class="add-product-text">Date</p>
                        <input type="date" class="add-product-input" name="NGAYDAT">
                    </div>

                    <div class="add-product-line">
                        <p class="add-product-text">Total</p>
                        <input type="number" class="add-product-input" id="totalThanhToan" name="THANHTOAN" readonly>
                    </div>

                    <input type="hidden" id="giaSanPham" name="GIA">

                    <div class="add-product-line add-order-row">
                        <p class="add-product-text">Status</p>
                        <select class="add-order-select" name="TINHTRANG">
                            <option value="Delivering">Delivering</option>
                            <option value="Wait for confirmation">Wait for confirmation</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>

                    <div class="add-product-btn">
                        <button type="submit" class="add-product-btn-add" name="add_order">
                            Add
                        </button>
                        <button type="reset" class="add-product-btn-resert">Return</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_order'])) {
        // Kết nối tới cơ sở dữ liệu
        include("ketnoi.php");
        $ID_CT = uniqid();
        $ID_DH = uniqid();

        if ($ketnoi->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $ketnoi->connect_error);
        }

        // $customer_id = $_POST['customer_id'];
        $ID_KH = $_POST['ID_KH'];
        $ID_SP = $_POST['ID_SP'];
        $TEN_SP = $_POST['TEN_SP'];
        $SOLUONG = $_POST['SOLUONG'];
        $GIA = $_POST['GIA'];
        $NGAYDAT = $_POST['NGAYDAT'];
        $THANHTOAN = $_POST['THANHTOAN'];
        $TINHTRANG = $_POST['TINHTRANG'];

        // Thêm khách hàng vào cơ sở dữ liệu
        $query = "INSERT INTO ct_donhang (ID_KH, ID_SP, TEN_SP, SOLUONG, GIA, NGAYDAT, THANHTOAN, TINHTRANG) VALUES ('$ID_KH', '$ID_SP', '$TEN_SP', '$SOLUONG', '$GIA', '$NGAYDAT', '$TINHTRANG')";

        if (mysqli_query($ketnoi, $query)) {
            echo '<script>';
            echo 'alert("Thêm đơn hàng thành công");';
            echo "window.location ='order.php';";
            echo '</script>';
        } else {
            $ketqua = "Thêm đơn hàng thất bại!" . mysqli_error($ketnoi);
        }

        // Đóng kết nối cơ sở dữ liệu
        $ketnoi->close();
    }
    ?>

<script>
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
                $('#GIA').val(response);

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
        var gia = parseFloat($('#GIA').val());
        var soLuong = parseInt($('#SOLUONG').val());

        // Kiểm tra xem giá và số lượng có phải là số hợp lệ không
        if (!isNaN(gia) && !isNaN(soLuong)) {
            var total = gia * soLuong;

            // Hiển thị tổng thanh toán trong input
            $('#totalThanhToan').val(total.toFixed(2));
        }
    }
});
</script>
</body>
</html>