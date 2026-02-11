function validateLogin() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let isValid = true;

    // Clear previous errors
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    // Email validation
    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required";
        isValid = false;
    }

    // Password validation
    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Password is required";
        isValid = false;
    }

    return isValid;
}
