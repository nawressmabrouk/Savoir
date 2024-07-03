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

$formtext = $_POST['formtext'];
$email = $_SESSION['email'];
$currentDate = date('Y-m-d');
echo '<script>document.getElementById("submitBtn").disabled = true;</script>';
$sql = "INSERT INTO forum (email, text, date) VALUES ('$email', '$formtext', '$currentDate')";
if ($conn->query($sql) === TRUE) {
    header("Location: forum.html");
        exit();

} else {
    echo "Error: " . $conn->error;
}





$conn->close();
?>