<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    $host = 'localhost';
    $username = 'your_mysql_username';
    $password = 'your_mysql_password';
    $database = 'agonodb';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET name = '$name', email = '$email', role = '$role' WHERE id = $user_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
