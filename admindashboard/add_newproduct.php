<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $category = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock_quantity = $_POST['stock_quantity'];

    $imgsrc = null;

    // Validation
    if (empty($name) || empty($price) || empty($description) || empty($stock_quantity)) {
        echo "All fields are required.";
        exit;
    }

    // Handle image upload
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === 0) {
        $imgsrc = $_FILES['productImage']['name'];
        $tmp_name = $_FILES['productImage']['tmp_name'];
        $target_path = "../assets/img/" . basename($imgsrc);

        if (!move_uploaded_file($tmp_name, $target_path)) {
            echo "Failed to upload image.";
            exit;
        }
    }

    // Insert product into database
    if ($imgsrc) {
        $sql = "INSERT INTO products (category_id, name, price, description, stock_quantity, imgsrc) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $category, $name, $price, $description, $stock_quantity, $imgsrc);
    } else {
        $sql = "INSERT INTO products (category_id, name, price, description, stock_quantity) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $category, $name, $price, $description, $stock_quantity);
    }

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Product added successfully!";
        header("Location: index.php"); // Redirect to index after successful submission
        exit;
    } else {
        echo "Failed to add product.";
    }

    $stmt->close();
}
?>
