<?php
header('Content-Type: application/json');

$postData = json_decode(file_get_contents('php://input'), true);

$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "php_simple_login_page";

$conn = new mysqli($servername, $username, $password);

if (isset($postData["initialize_database"])) {
    $errors = 0;

    if ($conn->connect_error) {
        echo json_encode(["status" => "failed", "message" => "Database Connection Error!"]);

        $errors++;
    }

    $result = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'");

    if ($result->num_rows == 0) {
        $conn->query("CREATE DATABASE $databaseName");
    }

    $conn->select_db($databaseName);

    $tableName = "tbl_users_info";
    $result = $conn->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$databaseName' AND TABLE_NAME = '$tableName'");

    if ($result->num_rows == 0) {
        $conn->query("CREATE TABLE $tableName (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255), username VARCHAR(255), password VARCHAR(255))");
        $conn->query("INSERT INTO $tableName (name, username, password) VALUES ('Administrator', 'admin', 'admin123')");
    }

    $conn->close();

    if ($errors == 0) {
        echo json_encode(["status" => "ok", "message" => "Database Connected!"]);
    }
}

if (isset($postData["login"])) {
    $conn->select_db($databaseName);

    $username = $conn->real_escape_string($postData["username"]);
    $password = $conn->real_escape_string($postData["password"]);

    $query = "SELECT * FROM tbl_users_info WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            echo json_encode(["status" => "ok", "message" => "Login Successful!"]);
        } else {
            echo json_encode(["status" => "failed", "message" => "Invalid Username or Password!"]);
        }
    }

    $conn->close();
}
