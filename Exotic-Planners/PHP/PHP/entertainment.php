<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $eventSpan = $_POST['event_span'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $setupPreference = $_POST['setup_preference'];
    $theme = $_POST['theme'];
    $budget = $_POST['budget'];

    // Connect to your MySQL database (replace placeholders with actual values)
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "entertainment.sql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert form data into a table (replace placeholders with actual table and column names)
    $sql = "INSERT INTO your_table (event_span, adults, kids, setup_preference, theme, budget)
            VALUES ('$eventSpan', '$adults', '$kids', '$setupPreference', '$theme', '$budget')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
