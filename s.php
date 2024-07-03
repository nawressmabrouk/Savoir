<?php

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


$fullname = $_POST['fullname'];
$section = $_POST['section'];
$email = $_POST['email1'];
$password = $_POST['pass'];

// SQL query to insert data
$sql = "INSERT INTO etudiant  VALUES ('$fullname', '$section', '$email','$password')";
// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
    echo "<script>setTimeout(function() { window.location.href = 'sl.html'; }, 2000);</script>";

} else {
    echo "Error: " . $conn->error;
}







$conn->close();
?>