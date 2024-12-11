<?php
include('../db_conn.php');

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id']; 

    
    $sql = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iii", $quantity, $user_id, $product_id);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update cart']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to prepare statement']);
    }

    $conn->close();
}
?>
