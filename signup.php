<?php
include 'db_conn.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username']) && isset($data['email']) && isset($data['password']) && isset($data['fullname'])) {
    $username = trim($data['username']);
    $email = trim($data['email']);
    $password = $data['password'];
    $fullname = trim($data['fullname']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format']);
        exit;
    }

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'username_exists', 'message' => 'Username or email already exists']);
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password, full_name) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . $conn->error]);
            exit;
        }

        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $fullname);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Account created successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Execution Error: ' . $stmt->error]);
        }
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
}

$conn->close();
?>
