<?php
include '../db_conn.php';

$sql = "SELECT p.product_id, p.name as prodname, c.name as catname, p.imgsrc 
        FROM products p
        INNER JOIN categories c ON c.category_id = p.category_id
        ORDER BY p.views DESC
        LIMIT 10";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);

$stmt->close();
$conn->close();
?>
