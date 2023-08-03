<?php
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];

    $host = 'localhost';
    $username = 'your_mysql_username';
    $password = 'your_mysql_password';
    $database = 'agonodb';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $role = $row["role"];

        echo "<h2>Edit User</h2>";
        echo "<form action='updateuser.php' method='post'>";
        echo "<input type='hidden' name='user_id' value='$user_id'>";
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' name='name' value='$name' required>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' name='email' value='$email' required>";
        echo "<label for='role'>Role:</label>";
        echo "<input type='text' name='role' value='$role' required>";
        echo "<button type='submit'>Save Changes</button>";
        echo "</form>";
    } else {
        echo "User not found.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
