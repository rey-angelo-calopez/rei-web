<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock_quantity = $_POST['stock_quantity'];
    
    $imgsrc = null;
    
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === 0) {
        $imgsrc = $_FILES['productImage']['name'];
        $tmp_name = $_FILES['productImage']['tmp_name'];
        $target_path = "../assets/img/" . basename($imgsrc);
        move_uploaded_file($tmp_name, $target_path);
    }

    if ($imgsrc) {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, stock_quantity = ?, imgsrc = ? WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $name, $price, $description, $stock_quantity, $imgsrc, $product_id);
    } else {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, stock_quantity = ? WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssi', $name, $price, $description, $stock_quantity, $product_id);
    }

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Product updated successfully";
    } else {
        echo "Failed to update product";
    }
    
    $stmt->close();
}
?>
