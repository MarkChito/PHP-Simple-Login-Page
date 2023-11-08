<?php
class UserModel
{
    private $mysqli; // MySQLi connection

    public function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $password = null; // Assuming no password is set
        $database = 'php_simple_login_page';

        // Connect to MySQL server
        $mysqli = new mysqli($host, $user, $password, $database);

        // Check if the connection was successful
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $this->mysqli = $mysqli;
    }

    public function getUserByEmail($username)
    {
        // Sanitize the username to prevent SQL injection (use prepared statements for added security)
        $username = $this->mysqli->real_escape_string($username);
        
        // SQL query to retrieve the user by email
        $query = "SELECT * FROM tbl_users_info WHERE username = '$username'";

        // Execute the query
        $result = $this->mysqli->query($query);

        if ($result) {
            // Fetch the user data as an associative array
            $user = $result->fetch_assoc();

            // Close the result set
            $result->close();

            return $user;
        } else {
            // Handle the database query error (e.g., log it or return an error code)
            return null;
        }
    }
}
