# Simple PHP Login Page using XAMPP

This is a simple PHP login page project that demonstrates user authentication using XAMPP as the web server and MySQL as the database.

## Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html): Ensure you have XAMPP installed on your system.

## Installation

1. Clone or download the project files to your local machine.

2. Place the project folder inside the "htdocs" directory of your XAMPP installation. The path to the "htdocs" directory might be something like `C:\xampp\htdocs` on Windows, or `/Applications/XAMPP/htdocs` on macOS.

3. Start the XAMPP Control Panel and start the Apache and MySQL services.

4. Open your web browser and navigate to `http://localhost/project-folder-name/`, replacing `project-folder-name` with the name of the directory where you placed the project files.

## Database Setup

1. Create a new database using phpMyAdmin:
   - Open your web browser and go to `http://localhost/phpmyadmin`.
   - Click on "Databases" in the top navigation.
   - Enter a database name (e.g., `php_simple_login_page`) and click "Create."

2. Configure the database connection:
   - Open the `Database.php` file located in the `configs` folder.
   - Update the database connection details if necessary (e.g., database name, username, and password).

## Usage

1. Access the login page:
   - Open your web browser and go to `http://localhost/project-folder-name/`.
   - You should see the login page.

2. Log in:
   - Enter the default credentials:
     - Username: admin
     - Password: admin123
   - Click the "Login" button.

3. If the login is successful, you will be redirected to a success page or a protected area as defined in your application.

## Customization

You can customize this project by:

- Modifying the design and layout of the login form (`login.php`).
- Implementing user registration.
- Enhancing user authentication and security features.
- Adding a user dashboard or protected areas.
- Adapting it for a production environment with stronger security practices.

## License

This project is open-source and available under the [MIT License](LICENSE).
