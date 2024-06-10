<?php
// Establishing connection to MySQL database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "packages.sql";

$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $span_of_event = mysqli_real_escape_string($conn, $_POST['span_of_event']);
    $budget_food_drinks = mysqli_real_escape_string($conn, $_POST['budget_food_drinks']);
    $budget_entertainment = mysqli_real_escape_string($conn, $_POST['budget_entertainment']);
    $budget_decorations = mysqli_real_escape_string($conn, $_POST['budget_decorations']);
    $invitors = mysqli_real_escape_string($conn, $_POST['invitors']);
    $fun_activities = mysqli_real_escape_string($conn, $_POST['fun_activities']);

    // Inserting data into MySQL database
    $sql = "INSERT INTO event_registration (name, span_of_event, budget_food_drinks, budget_entertainment, budget_decorations, invitors, fun_activities)
    VALUES ('$name', '$span_of_event', '$budget_food_drinks', '$budget_entertainment', '$budget_decorations', '$invitors', '$fun_activities')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
