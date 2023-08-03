<?php
$host = 'localhost';
$username = 'your_mysql_username';
$password = 'your_mysql_password';
$database = 'agonodb';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["event_name"]) && isset($_POST["event_description"]) && isset($_FILES["imageUpload"])) {
        $event_name = $_POST["event_name"];
        $event_description = $_POST["event_description"];

        $targetDir = "FrontEnd/Images/";
        $imageName = $_FILES["imageUpload"]["name"];
        $targetFilePath = $targetDir . basename($imageName);
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFilePath)) {
            $stmt = $conn->prepare("INSERT INTO events (event_name, event_description, event_image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $event_name, $event_description, $imageName);

            if ($stmt->execute()) {
                echo "Event added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: Failed to move the uploaded image.";
        }
    } else {
        echo "Error: Invalid form submission.";
    }
}

$conn->close();
?>