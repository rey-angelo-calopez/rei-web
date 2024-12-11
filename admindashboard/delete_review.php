<?php
include '../db_conn.php';

if (isset($_POST['review_id']) && is_numeric($_POST['review_id'])) {
    $review_id = $_POST['review_id'];

    $query = "DELETE FROM reviews WHERE review_id = ?";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $review_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "Review deleted successfully.";
        } else {
            echo "Error deleting review: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the query.";
    }
} else {
    echo "Invalid review ID.";
}

mysqli_close($conn);
?>
