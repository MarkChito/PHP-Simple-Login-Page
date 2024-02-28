<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simple Login Form</title>

    <link rel="shortcut icon" href="./dist/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./dist/css/style.css">
</head>

<body>
    <div class="login-container">
        <div style="display: block;">
            <div class="alert alert-success" id="login_alert">Initializing Database. Please Wait...</div>

            <div class="login-form">
                <div class="box-header">
                    <img src="./dist/img/favicon.png" alt="PHP Icon">

                    <h1>Simple Login Form</h1>
                </div>
                <hr>
                <div class="box-body">
                    <form id="login_form" action="javascript:void(0)">
                        <div class="form-group">
                            <label for="login_username">Username</label>
                            <input type="text" id="login_username" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="login_password">Password</label>
                            <input type="password" id="login_password" required disabled>
                        </div>

                        <input type="submit" class="btn-submit" id="login_submit" value="Login" disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./dist/js/script.js"></script>
</body>

</html>