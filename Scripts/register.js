function checkForm() {
    var email = document.getElementById("email").value;
    var confirmEmail = document.getElementById("confirmEmail").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorMessage = document.getElementById("errorMessage");
    var form = document.getElementById("myForm");

    if (email !== confirmEmail || password !== confirmPassword || !email || !confirmEmail || !password || !confirmPassword) {
        errorMessage.style.display = "block";
        return false;
    } else {
        errorMessage.style.display = "none";
        return true;
    }
}