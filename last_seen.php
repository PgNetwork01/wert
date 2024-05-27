<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user credentials
    $stmt = $conn->prepare("SELECT id, role FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $role);
        $stmt->fetch();

        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Update last seen time
        $update_stmt = $conn->prepare("UPDATE users SET last_seen = NOW() WHERE id = ?");
        $update_stmt->bind_param("i", $user_id);
        $update_stmt->execute();
        $update_stmt->close();

        // Redirect to the dashboard or homepage
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>
