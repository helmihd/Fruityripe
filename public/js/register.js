const showPassword = document.querySelector("#show-password");
const passwordField = document.querySelector("#password");

showPassword.addEventListener("click", function () {
    this.classList.toggle("fa-eye-slash");
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
});

// Assuming you have a different icon for the confirm password field

const showConfirmPassword = document.querySelector("#show-confirm-password");
const confirmPasswordField = document.querySelector("#confirm-password");

showConfirmPassword.addEventListener("click", function () {
    this.classList.toggle("fa-eye-slash");
    const type = confirmPasswordField.getAttribute("type") === "password" ? "text" : "password";
    confirmPasswordField.setAttribute("type", type);
});

const form = document.querySelector(".login-form");

form.addEventListener("submit", function (event) {
    const passwordValue = passwordField.value;
    const confirmPasswordValue = confirmPasswordField.value;

    // Pemeriksaan apakah password dan konfirmasi password sama
    if (passwordValue !== confirmPasswordValue) {
        alert("Password and Confirm Password must match.");
        event.preventDefault(); // Mencegah formulir dikirim jika password tidak sesuai
    }
});
