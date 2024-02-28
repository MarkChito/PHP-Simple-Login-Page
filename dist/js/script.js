const login_form = document.getElementById("login_form");

login_form.addEventListener("submit", function () {
    const alert = document.getElementById("login_alert");
    const username = document.getElementById("login_username");
    const password = document.getElementById("login_password");
    const submit = document.getElementById("login_submit");

    username.disabled = true;
    password.disabled = true;
    submit.disabled = true;
    submit.value = "Processing Request...";

    alert.classList.add("d-none");
    alert.classList.remove("alert-success");
    alert.classList.remove("alert-danger");

    login(username.value, password.value).then(function (response) {
        setTimeout(function () {
            if (response.status == "ok") {
                alert.classList.remove("d-none");
                alert.classList.add("alert-success");
                alert.textContent = response.message;
            }

            else {
                alert.classList.remove("d-none");
                alert.classList.add("alert-danger");
                alert.textContent = response.message;
            }

            username.removeAttribute("disabled");
            password.removeAttribute("disabled");
            submit.removeAttribute("disabled");
            submit.value = "Login";
        }, 1500);
    });
});

async function login(username, password) {
    try {
        const url = 'api.php';

        const data = {
            login: true,
            username: username,
            password: password
        };

        const options = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        };

        const response = await fetch(url, options);

        const responseData = await response.json();

        return responseData;
    }

    catch (error) {
        console.error('Error sending POST request:', error);
    }
}

async function initialize_database() {
    const alert = document.getElementById("login_alert");
    const username = document.getElementById("login_username");
    const password = document.getElementById("login_password");
    const submit = document.getElementById("login_submit");

    try {
        const url = 'api.php';

        const data = {
            initialize_database: true
        };

        const options = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        };

        const response = await fetch(url, options);

        const responseData = await response.json();

        if (responseData.status == "ok") {
            setTimeout(function () {
                alert.classList.add("d-none");
                alert.classList.remove("alert-success");

                username.removeAttribute("disabled");
                password.removeAttribute("disabled");
                submit.removeAttribute("disabled");
            }, 1500);
        }

        else {
            location.href = "database_error.php";
        }
    }

    catch (error) {
        location.href = "database_error.php";
    }
}

initialize_database();