<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <?php if (isset($_SESSION['login_status'])) : ?>
                    <?php
                    $loginStatus =  $_SESSION['login_status'];
                    $type = $loginStatus['type'];
                    $message = $loginStatus['message'];
                    ?>
                    <div class="alert alert-<?= $type ?> text-center" role="alert">
                        <?= $message ?>
                    </div>
                <?php endif ?>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login Page</h2>
                        <hr>
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php unset($_SESSION['login_status']); ?>