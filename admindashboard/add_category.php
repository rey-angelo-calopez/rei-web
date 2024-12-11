<?php
include '../db_conn.php';

if (isset($_POST['category_name'])) {
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);

    $check_category_sql = "SELECT * FROM categories WHERE name = '$category_name'";
    $result = mysqli_query($conn, $check_category_sql);

    if (mysqli_num_rows($result) > 0) {
        echo 'exists';
    } else {
        $insert_category_sql = "INSERT INTO categories (name) VALUES ('$category_name')";
        if (mysqli_query($conn, $insert_category_sql)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

mysqli_close($conn);
?>
