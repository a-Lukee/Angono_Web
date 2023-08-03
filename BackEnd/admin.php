<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="FrontEnd/STYLE/admin.css">
</head>
<body>
    <script src="Scripts/index.js"></script>
    <nav class="navbar">
        <ul class="nav-menu">
            <li><a href="index.html">VIEW</a></li>
            <li><a href="adminhome.html" class="active">Home</a></li>
            <li><a href="adminevent.html">Event</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="#" class="register-button" onclick="openReg()">Register</a>
            <a href="#" class="login-button" onclick="openLog()">Login</a>
        </div>
    </nav>
    <div class="content" style="background-image: url('FrontEnd/Images/home.png');">
        <button class="add-button" onclick="openForm()">Add User</button>
        <a href="BackEnd/adminevent.html" class="custom-button">Admin Events</a>
        <a href="#" class="custom-button">Custom Button</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>

            <?php
            $host = 'localhost';
            $username = 'root';
            $password = '4996gbh6';
            $database = 'agonodb';

            $conn = new mysqli($host, $username, $password, $database);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch user data from the database
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td>";
                    echo "<a href='edituser.php?id=" . $row["id"] . "'>Edit</a> | ";
                    echo "<a href='deleteuser.php?id=" . $row["id"] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
