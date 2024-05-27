<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';
// include 'last_seen.php'; // Make sure this file contains your DB connection details

// Function to update last seen time for the user
function update_last_seen($conn, $username) {
    $stmt = $conn->prepare("UPDATE users SET last_seen = NOW() WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}

// Update last seen time if the user is logged in
if (isset($_SESSION['username'])) {
    update_last_seen($conn, $_SESSION['username']);
}

// Fetch users and their roles
$query = "SELECT username, role FROM users";
$result = $conn->query($query);

if (!$result) {
    die('Error: ' . $conn->error);
}

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Users and Roles</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Change User Role</h2>
    <form action="change_role.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="moderator">Moderator</option>
            <option value="member">Member</option>
        </select>

        <button type="submit">Change Role</button>
    </form>
</body>
</html>
