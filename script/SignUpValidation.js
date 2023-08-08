function showError(id, message) {
    const errorElement = document.getElementById(id);
    errorElement.innerText = message;
    errorElement.style.display = "block";
}

function hideError(id) {
    const errorElement = document.getElementById(id);
    errorElement.innerText = "";
    errorElement.style.display = "none";
}

    
const form = document.querySelector("form");
form.addEventListener("submit", (event) => {

    let isValid = true;

    // --- Username Validation ---

    const usernameInput = document.getElementById("Username");

    usernameInput.addEventListener("input", () => {
        hideError("username-error");
    });


    if (usernameInput.value.trim() === "") {
        showError("username-error", "Username cannot be empty."); //-- Not Empty
        isValid = false;
    }
    if (/\s/.test(usernameInput.value)) {
        showError("username-error", "Username cannot contain spaces."); //-- Not a Space
        isValid = false;
    }
    if (/^(?=.*\d)/.test(usernameInput.value)) {
        showError("username-error", "Username can not conatain number."); //-- Not a Space
        isValid = false;
    }

    // --- Password Validation ---
    
    const passwordInput = document.getElementById("password");

    passwordInput.addEventListener("input", () => {
        hideError("password-error");
    });

    if (! /[A-Z]/.test(passwordInput.value)) {
        showError("password-error", "Password must contain Uppercase letter."); //-- Not a Space
        isValid = false;
    }

    if (! /[a-z]/.test(passwordInput.value)) {
        showError("password-error", "Password must contain lowercase letter."); //-- Not a Space
        isValid = false;
    }

    if (! /\d/.test(passwordInput.value)) {
        showError("password-error", "Password must have at least one number."); //-- Not a Space
        isValid = false;
    }

    if (! /[@$!%*?&]/.test(passwordInput.value)) {
        showError("password-error", "Password must conatain a special character.\n[@,$,!,*,%,?,&]."); //-- Not a Space
        isValid = false;
    }

    if (passwordInput.value.length < 7) {
        showError("password-error", "Password must be 8 characters long.");
        isValid = false;
    }

    if (usernameInput.value == passwordInput.value) {
        showError("password-error", "password can not be same as username."); //-- Not a Space
        isValid = false;
    }

    if (passwordInput.value.trim() === "") {
        showError("password-error", "Password cannot be empty."); //-- Not Empty
        isValid = false;
    }

    // --- Re-Password Validation ---

    const rePasswordInput = document.getElementById("password2");

    rePasswordInput.addEventListener("input", () => {
        hideError("rePassword-error");
    });


    if (rePasswordInput.value.trim() === "") {
        showError("rePassword-error", "Confirmation cannot be empty."); //-- Confirm Not Empty
        isValid = false;
    }else{
        if (passwordInput.value !== rePasswordInput.value) {
            showError("rePassword-error", "Passwords do not match."); //-- Not Match
            isValid = false;
        }
    }


    // --- Email validation ---

    const emailInput = document.getElementById("Email");

    emailInput.addEventListener("input", () => {
        hideError("email-error");
    });


    if (emailInput.value.trim() === "") {
        showError("email-error", "Email cannot be empty.");  //-- Email validation
        isValid = false;
    } else {

        if (! /^[a-zA-Z0-9._%+-]{2,}@[a-zA-Z0-9.-]{2,}\.[a-zA-Z]{2,}$/.test(emailInput.value)) {
            showError("email-error", "Enter Valid Email. [example@gmail.com]"); //-- Not a Space
            isValid = false;
        }
    }

    // If the form is not valid, prevent it from being submitted

    if (!isValid) {
        event.preventDefault();
    }

});