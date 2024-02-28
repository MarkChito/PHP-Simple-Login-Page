const login_form = document.getElementById("login_form");

login_form.addEventListener("submit", function () {
    const username = document.getElementById("login_username");
    const password = document.getElementById("login_password");
    const submit = document.getElementById("login_submit");

    const alert = document.getElementById("login_alert");

    username.disabled = true;
    password.disabled = true;

    submit.value = "Processing...";
    submit.disabled = true;

    // alert.classList.remove("d-none");
});