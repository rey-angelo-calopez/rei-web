<?php
include '../db_conn.php';

if (isset($_POST['user_id'], $_POST['product_id'], $_POST['quantity'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `cart` (`user_id`, `product_id`, `quantity`) 
            VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);

        if ($stmt->execute()) {
            echo "Product successfully added to the cart!";
        } else {
            echo "Failed to add product to the cart.";
        }

        $stmt->close();
    } else {
        echo "Error preparing SQL statement.";
    }

    $conn->close();
} else {
    echo "Missing required data.";
}
?>
