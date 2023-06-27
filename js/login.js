// login show password

let loginBtn = document.getElementById("btn");
let loginPass = document.getElementById("pass");
let loginIcon = document.querySelector(".icon");

loginBtn.addEventListener("click", function () {
    if (loginPass.type === "password") {
        loginPass.type = "text";
        loginIcon.classList.add("fa-eye");
        loginIcon.classList.remove("fa-eye-slash");
    } else {
        loginPass.type = "password";
        loginIcon.classList.remove("fa-eye");
        loginIcon.classList.add("fa-eye-slash");
    }
});
