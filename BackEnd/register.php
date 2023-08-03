<?php
$host = 'localhost';
$username = 'root';
$password = '4996gbh6';
$database = 'agonodb';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fname = $_POST["Fname"];
    $email = $_POST["email"];
    $occup = $_POST["occup"];
    $address = $_POST["address"];
    $day = $_POST["day"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "Prefer not to say";

    $stmt = $conn->prepare("INSERT INTO users (Fname, email, occup, address, day, gender) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $Fname, $email, $occup, $address, $day, $gender);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
