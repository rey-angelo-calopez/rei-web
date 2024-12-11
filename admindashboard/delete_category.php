<?php
include '../db_conn.php';

if (isset($_POST['category_id'])) {
    $category_id = intval($_POST['category_id']);

    mysqli_begin_transaction($conn);

    try {
        $delete_products_sql = "DELETE FROM products WHERE category_id = ?";
        $stmt = mysqli_prepare($conn, $delete_products_sql);
        mysqli_stmt_bind_param($stmt, 'i', $category_id);
        mysqli_stmt_execute($stmt);

        $delete_category_sql = "DELETE FROM categories WHERE category_id = ?";
        $stmt = mysqli_prepare($conn, $delete_category_sql);
        mysqli_stmt_bind_param($stmt, 'i', $category_id);
        mysqli_stmt_execute($stmt);

        mysqli_commit($conn);

        echo "Category and products deleted successfully.";
    } catch (Exception $e) {
        mysqli_roll_back($conn);
        echo "Error deleting category and products: " . $e->getMessage();
    }
}

mysqli_close($conn);
?>
