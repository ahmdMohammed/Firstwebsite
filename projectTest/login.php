<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to MySQL database (replace with your database credentials)
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "recpie";

    $conn = new mysqli($servername, $username_db, $password_db, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to retrieve user data
    $sql = "SELECT * FROM users_info WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify the username and password
    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Login successful, set session and redirect to dashboard or homepage
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        } else {
            // Login failed, redirect back to login page with error message
            header("Location: login.html?error=1");
            exit();
        }
    } else {
        // User not found, redirect back to login page with error message
        header("Location: login.php?error=1");
        exit();
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
