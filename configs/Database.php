<?php
$host = 'localhost';
$user = 'root';
$password = null; // Assuming no password is set
$database = 'php_simple_login_page';

// Connect to MySQL server
$mysqli = new mysqli($host, $user, $password);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create the database if it doesn't exist
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $database";
if ($mysqli->query($createDatabaseQuery) === TRUE) {
    // Database Created Successfully
} else {
    echo "Error creating database: " . $mysqli->error . "<br>";
}

// Close the initial connection
$mysqli->close();

// Connect to the newly created database
$mysqli = new mysqli($host, $user, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection to the database failed: " . $mysqli->connect_error);
}

// Create the 'tbl_users_info' table with a unique constraint on the 'username' column
$createTableQuery = "CREATE TABLE IF NOT EXISTS tbl_users_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,  -- Add UNIQUE constraint
    password VARCHAR(255) NOT NULL
)";

if ($mysqli->query($createTableQuery) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $mysqli->error . "<br>";
}

// Insert default credentials only if the username does not already exist
$defaultUsername = 'admin';
$defaultPassword = password_hash('admin123', PASSWORD_BCRYPT); // Encrypt the password

// Check if the username already exists in the table
$checkUsernameQuery = "SELECT id FROM tbl_users_info WHERE username = '$defaultUsername'";
$result = $mysqli->query($checkUsernameQuery);

if ($result && $result->num_rows == 0) {
    // Username does not exist; insert the default credentials
    $insertQuery = "INSERT INTO tbl_users_info (username, password) VALUES ('$defaultUsername', '$defaultPassword')";

    if ($mysqli->query($insertQuery) === TRUE) {
        // Data is inserted successfully
    } else {
        echo "Error inserting default credentials: " . $mysqli->error . "<br>";
    }
} else {
    // Username already exists
}

// Close the connection
$mysqli->close();
