<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Shopping Cart</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .view-button, .delete-button {
            background-color: #9099ff;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .view-button:hover, .delete-button:hover{
            background-color: #002d5a;
        }

        .home-link {
            display: inline-block;
            padding: 15px 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 8px;
            background-color: #9099ff;
            transition: background-color 0.3s, color 0.3s;
        }

        .home-link i {
            margin-right: 10px;
        }

        .home-link:hover {
            background-color: #002d5a;
        }

        .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        border-radius: 8px;
        overflow: hidden;
        max-width: 400px;
        width: 100%;
        z-index: 1000;
    }

    .modal-content {
        padding: 20px;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 18px;
        cursor: pointer;
        color: #333;
    }

    #purchaseForm{
        display: flex;
        flex-direction: column;
    }

    #purchaseForm label{
        margin: 5px;
    }

    #buyButton{
        float: right;
    }
    </style>
</head>
<body>
<a class="home-link" href="index.php"><i class="fa-solid fa-house"></i>Home</a>
<?php
include("ketnoi.php");

// Kiểm tra kết nối
if ($ketnoi->connect_error) {
    die("Connection failed: " . $ketnoi->connect_error);
}

$tong = 0;

// Truy vấn dữ liệu từ bảng giohang
$sql = "SELECT ID_SP, TEN_SP, SOLUONG, GIA FROM giohang";
$ketqua = $ketnoi->query($sql);

if ($ketqua->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID Product</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total Payment</th><th>Delete</th></tr>";

    // Hiển thị dữ liệu từ bảng
    while($row = $ketqua->fetch_assoc()) {
        // Tính toán giá trị mới
        $soluong = $row["SOLUONG"];
        $thanhtoan = $row["GIA"] * $soluong;

        // Cộng tổng thanh toán
        $tong += $thanhtoan;

        // Hiển thị dữ liệu trong bảng
        echo "<tr><td>" . $row["ID_SP"]. "</td><td>" . $row["TEN_SP"]. "</td><td>" . $row["GIA"]. "</td>";
        echo "<td>" . $soluong . "</td><td>" . $thanhtoan . "</td>";
        echo "<td><a href='delete_cart.php?id=" . $row["ID_SP"] . "' class='delete-button'>Delete</a></td></tr>";
    }
    echo "<tr><td colspan='4'>Total:</td><td>" . $tong . "</td><td></td>";  // Tổng thanh toán của tất cả sản phẩm
    echo "</table>";
} else {
    echo "No products in the shopping cart.";
}

// ... (các phần mã khác)
?>

<button class='delete-button' id="buyButton">Buy Now</button>

<!-- Modal -->
<div id="buyModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form id="purchaseForm" method="POST" action="purchase.php">
            <label for="customerName">Customer Name:</label>
            <input type="text" id="customerName" name="customerName" required>

            <label for="customerAddress">Address:</label>
            <input type="text" id="customerAddress" name="customerAddress" required>

            <label for="customerPhone">Phone Number:</label>
            <input type="text" id="customerPhone" name="customerPhone" required>

            <input type="hidden" id="totalPayment" name="totalPayment" value="<?php echo $tong; ?>">

            <button type="button" onclick="submitForm()">Confirm Purchase</button>
        </form>
    </div>
</div>



<script>
    var buyModal = document.getElementById('buyModal');
    var buyButton = document.getElementById('buyButton');
    var purchaseForm = document.getElementById('purchaseForm');

    function openModal() {
        buyModal.style.display = 'block';
    }

    function closeModal() {
        buyModal.style.display = 'none';
    }

    function submitForm() {
        purchaseForm.submit();
    }

    // Show modal when Buy button is clicked
    buyButton.addEventListener('click', openModal);
</script>
</body>
</html>