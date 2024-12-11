<?php
include '../db_conn.php'; 

$review = $_POST['review'];
$rating = $_POST['rating'];
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];



$query = "INSERT INTO reviews (product_id, user_id, review, rating) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($query);

$stmt->bind_param("iisi", $product_id, $user_id, $review, $rating);


if ($stmt->execute()) {
    echo "Review submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
