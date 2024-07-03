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

$email = $_POST['email'];
$password = $_POST['pass'];


$sql = "SELECT * FROM etudiant WHERE email='$email' AND password='$password'";


// Execute SQL query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Matching record found
    $row = $result->fetch_assoc();

    // Store data in session variables
    $_SESSION['email'] = $row['email']; // Set email in session

    //echo "etudiant found";
    header("Location: main.html");
} else {
    // No matching record found
    echo "etudiant not found";
    echo "<script>setTimeout(function() { window.location.href = 'sl.html'; }, 2000);</script>";
    //header("Location: sl.html");
    
}

// Close connection
$conn->close();
?>
