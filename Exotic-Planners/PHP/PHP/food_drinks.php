<?php
// Establishing connection to MySQL database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "food_drinks.sql";

$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $hotel = mysqli_real_escape_string($conn, $_POST['hotel']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $people = mysqli_real_escape_string($conn, $_POST['people']);
    $preference = mysqli_real_escape_string($conn, $_POST['preference']);
    $setup = mysqli_real_escape_string($conn, $_POST['setup']);
    $theme = mysqli_real_escape_string($conn, $_POST['theme']);
    $food = mysqli_real_escape_string($conn, $_POST['food']);
    $budget = mysqli_real_escape_string($conn, $_POST['budget']);
    $alcohol = mysqli_real_escape_string($conn, $_POST['alcohol']);
    $brands = mysqli_real_escape_string($conn, $_POST['brands']);

    // Inserting data into MySQL database
    $sql = "INSERT INTO event_details (hotel, event_date, people_count, preference, setup, theme, food_times, budget, alcohol_allowed, alcohol_brands)
    VALUES ('$hotel', '$date', '$people', '$preference', '$setup', '$theme', '$food', '$budget', '$alcohol', '$brands')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
