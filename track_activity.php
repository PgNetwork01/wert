<?php
session_start();
include 'config.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Check if there is an existing login record for the user
    $userIdQuery = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $userIdQuery->bind_param("s", $username);
    $userIdQuery->execute();
    $userId = $userIdQuery->get_result()->fetch_assoc()['id'];

    $loginTime = date("Y-m-d H:i:s");

    $insertActivityStmt = $conn->prepare("INSERT INTO user_activity (user_id, login_time) VALUES (?, ?)");
    $insertActivityStmt->bind_param("is", $userId, $loginTime);
    $insertActivityStmt->execute();

    // Store the activity id in session to update logout time later
    $_SESSION['activity_id'] = $conn->insert_id;
}

// Function to update logout time
function updateLogoutTime($conn, $activityId) {
    $logoutTime = date("Y-m-d H:i:s");
    $updateActivityStmt = $conn->prepare("UPDATE user_activity SET logout_time = ? WHERE id = ?");
    $updateActivityStmt->bind_param("si", $logoutTime, $activityId);
    $updateActivityStmt->execute();
}

// Register shutdown function to log logout time
register_shutdown_function(function() use ($conn) {
    if (isset($_SESSION['activity_id'])) {
        updateLogoutTime($conn, $_SESSION['activity_id']);
        unset($_SESSION['activity_id']);
    }
});
?>
