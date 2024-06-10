<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = ' '; // Ensure this is your actual database password
$DATABASE_NAME = 'ita';

// Create connection
$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form fields are not empty
if (!isset($_POST['uname'], $_POST['Password'])) {
    exit('Please fill both the username and password fields!');
}

// Prepare a SQL query to fetch the user's details based on the provided username
$stmt = $conn->prepare('SELECT id, username, password FROM register WHERE username = ?');
$stmt->bind_param('s', $_POST['uname']);
$stmt->execute();
$stmt->store_result();

// Check if a user with the provided username exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $username, $password);
    $stmt->fetch();
    
    // Verify the password
    if (password_verify($_POST['Password'], $password)) {
        // Start a session and set session variables
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;

        // Redirect to a logged-in page (e.g., dashboard.php)
        header('Location: dashboard.php');
        exit();
    } else {
        // Incorrect password
        echo 'Incorrect username and/or password!';
    }
} else {
    // User not found
    echo 'Incorrect username and/or password!';
}

$stmt->close();
$conn->close();
?>
