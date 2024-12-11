<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    if (isset($product_id)) {
        $sql = "DELETE FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $product_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product deleted successfully";
        } else {
            echo "Error: Product not found or could not be deleted.";
        }

        $stmt->close();
    } else {
        echo "Error: No product ID provided.";
    }
}
?>
