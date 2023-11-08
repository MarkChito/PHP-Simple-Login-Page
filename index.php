<?php
require_once 'configs/Database.php';
require_once 'controllers/LoginController.php';

$controller = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->showLoginForm();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->processLogin();
}