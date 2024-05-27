<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$username = $_SESSION['username'];
$logo = $_SESSION['user_logo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo htmlspecialchars($logo); ?>">
    <title>Profile - <?php echo htmlspecialchars($username); ?></title>
    <style>
        * {
            padding: 0;
            margin: 0;
            background-color: #323232;
        }

        #sidePanel {
            background-color: red;
            width: 10%;
        }
    </style>
</head>
<body>
    <div id="sidePanel">
        <button>Home</button>
    </div>
</body>
</html>