<?php
include 'db_conn.php';
session_start(); 

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminacc WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            $_SESSION['admin_id'] = $row['admin_id'];
            echo 'success';
        } else {
            echo 'invalid'; 
        }
    } else {
        echo 'invalid'; 
    }

    $stmt->close();
}
?>
