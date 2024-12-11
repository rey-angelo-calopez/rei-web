<?php
include '../db_conn.php';

$product_id = $_GET['product_id'];

$sql = "SELECT reviews.review, reviews.user_id, users.full_name 
        FROM reviews 
        INNER JOIN users ON reviews.user_id = users.user_id
        WHERE reviews.product_id = $product_id";

$result = $conn->query($sql);

$testimonials = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $testimonials[] = [
            'review' => $row['review'],
            'user_id' => $row['full_name']  
        ];
    }
} else {
    echo json_encode(['message' => 'No reviews found.']);
    exit;
}

$conn->close();

echo json_encode($testimonials);
?>
