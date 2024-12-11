<?php

session_start();
include('../db_conn.php');


if (isset($_POST['product_id'])) {
    
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; 

    
    $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";

    
    if ($stmt = $conn->prepare($sql)) {
        
        $stmt->bind_param("ii", $user_id, $product_id);

        
        if ($stmt->execute()) {
            
            echo json_encode(['success' => true, 'message' => 'Product removed from cart']);
        } else {
            
            echo json_encode(['success' => false, 'message' => 'Failed to remove product from cart']);
        }

        
        $stmt->close();
    } else {
        
        echo json_encode(['success' => false, 'message' => 'Error preparing the SQL query']);
    }

    
    $conn->close();
} else {
    
    echo json_encode(['success' => false, 'message' => 'No product ID provided']);
}
?>
