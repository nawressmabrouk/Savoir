<?php

session_start(); // Start the session

// Database connection parameters
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "savoir"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];

// Retrieve the values from the form
$iddoc = $_POST['iddoc']; // Document identifier
$rating = $_POST['rating']; // Rating value (1 to 5)
$comment = $_POST['comment']; // Comment text
$date = date("Y-m-d"); // Corrected assignment of date

if ($comment != '' && $rating != '') {
    $sql1 = "INSERT INTO comment (iddoc, text, email, date, evaluation) VALUES ('$iddoc', '$comment', '$email', '$date', '$rating')";
    
    $result1 = $conn->query($sql1); // Corrected variable name for the query
    echo "comment added";

    echo "<script>setTimeout(function() { window.location.href = 'main2.php'; }, 2000);</script>";
}











?>