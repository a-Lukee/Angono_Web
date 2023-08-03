<?php
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];

    $host = 'localhost';
    $username = 'root';
    $password = '4996gbh6';
    $database = 'agonodb';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM users WHERE id = $user_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
