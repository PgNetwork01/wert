<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $test_input = $_POST['test_input'];
    echo "POST request received. You entered: " . htmlspecialchars($test_input);
} else {
    echo "Only POST requests are allowed.";
}
?>
