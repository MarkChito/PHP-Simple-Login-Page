<?php
session_start();

require_once 'models/UserModel.php';

class LoginController
{
    public function showLoginForm()
    {
        include 'views/login.php';
    }

    public function processLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->getUserByEmail($username);

            if ($user) {
                $hash = $user["password"];

                if (password_verify($password, $hash)) {
                    $_SESSION['login_status'] = array('type' => 'success', 'message' => 'Login Successful.');
                } else {
                    $_SESSION['login_status'] = array('type' => 'danger', 'message' => 'Invalid username or password.');
                }
            } else {
                $_SESSION['login_status'] = array('type' => 'danger', 'message' => 'Invalid username or password.');
            }

            $this->showLoginForm();
        }
    }
}
