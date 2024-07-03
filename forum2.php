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

// Select data from the 'forum' table
$sql = "SELECT f.*, e.fullname FROM forum f INNER JOIN etudiant e ON f.email = e.email";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $messages = array();
    // Fetch data and store in an array
    while ($row = $result->fetch_assoc()) {
        $messages[] = array(
            'author' => $row['fullname'],
            'timestamp' => $row['date'],
            'body' => $row['text']
            
            
        );
    }
    // Convert array to JSON
    echo json_encode($messages);
} else {
    echo json_encode(array('error' => 'No messages found.'));
}

// Close connection
$conn->close();
?>
