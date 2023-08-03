function login() {
    var username = document.getElementsByName("username")[0].value;
    var password = document.getElementsByName("password")[0].value;

    var predefinedUsername = "admin";
    var predefinedPassword = "1234";

    if (username === predefinedUsername && password === predefinedPassword) {
        window.location.href = "BackEnd/admin.php";
    } else {
        alert("Invalid username or password. Please try again.");
    }
}