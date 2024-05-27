<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id']; // Assuming you have a user ID
            $_SESSION['user_role'] = $user['role']; // Assuming you have a user ID
            $_SESSION['user_logo'] = $user['logo']; // Assuming you have a user logo field
            $_SESSION['email'] = $user['email']; // Assuming you have a user email field

            if ($_SESSION['user_role'] == 'Admin') {
                header("Location: admin_dashboard.php");
            }

            else {
                header("Location: main.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
    $stmt->close();
}
?>
