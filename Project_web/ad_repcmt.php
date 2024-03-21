<?php
session_start();

include("ketnoi.php");

// Kiểm tra nếu form trả lời được submit
if (isset($_POST['submit_reply'])) {
    $review_id = mysqli_real_escape_string($ketnoi, $_POST['review_id']);
    $response = mysqli_real_escape_string($ketnoi, $_POST['response']);

    // Cập nhật trả lời vào cơ sở dữ liệu
    $sql_insert_reply = "UPDATE danhgia_sp SET TRALOI = '$response' WHERE ID_DGIA = '$review_id'";
    $result_insert_reply = mysqli_query($ketnoi, $sql_insert_reply);

    if ($result_insert_reply) {
        echo '<script>alert("Reply to review successfully!"); window.location = "ad_repcmt.php";</script>';
    } else {
        echo "Lỗi khi lưu trả lời: " . mysqli_error($ketnoi);
    }
}

// Truy vấn danh sách đánh giá từ bảng danhgia_sp
$sql_reviews = "SELECT * FROM danhgia_sp";
$result_reviews = mysqli_query($ketnoi, $sql_reviews);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Review List</title>
    <style>
        .reviews-list {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .reply-container {
            margin-top: 20px;
        }

        .reply-form {
            display: flex;
            flex-direction: column;
        }

        .reply-form textarea {
            resize: vertical;
            padding: 10px;
            margin-bottom: 10px;
        }

        .reply-form button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .reply-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="admin-content">
        <h2>Review List</h2>
        
        <?php
        if ($result_reviews->num_rows > 0) {
            ?>
            <div class="reviews-list">
                <table>
                    <tr>
                        <th>Review ID</th>
                        <th>Product ID</th>
                        <th>Customer ID</th>
                        <th>Review</th>
                        <th>Response</th>
                        <th>Reply</th>
                    </tr>
                    <?php
                    while ($review = $result_reviews->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $review['ID_DGIA']; ?></td>
                            <td><?php echo $review['ID_SP']; ?></td>
                            <td><?php echo $review['ID_KH']; ?></td>
                            <td><?php echo $review['NOIDUNG_DG']; ?></td>
                            <td><?php echo $review['TRALOI']; ?></td>
                            <td>
                                <button onclick="toggleReply('<?php echo $review['ID_DGIA']; ?>')">Reply</button>
                                <!-- Form trả lời -->
                                <div class="reply-container" id="replyContainer_<?php echo $review['ID_DGIA']; ?>" style="display: none;">
                                    <h3>Reply to Review</h3>
                                    <form method="POST" action="ad_repcmt.php">
                                        <input type="hidden" name="review_id" value="<?php echo $review['ID_DGIA']; ?>">
                                        <div class="reply-form">
                                            <textarea name="response" placeholder="Type your response here..."></textarea>
                                            <button type="submit" name="submit_reply">Submit Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        <?php
        } else {
            echo "No reviews available.";
        }
        ?>

    </div>

    <script>
        function toggleReply(reviewId) {
            var container = document.getElementById('replyContainer_' + reviewId);
            container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
        }
    </script>

</body>
</html>
