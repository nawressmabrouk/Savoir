<?php
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
session_start();
$email=$_SESSION['email'];
$unjoincode = $_POST['code'];
$sql = "SELECT * FROM joinedroom where email='$email' and idroom='$unjoincode'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sqlf = "DELETE FROM joinedroom where email='$email' and idroom='$unjoincode'";
    $resultf = $conn->query($sqlf);
    echo "ROOM UNJOINED";
    echo "<script>setTimeout(function() { window.location.href = 'a.php'; }, 2000);</script>";
    exit();
} else {
    header('Location: unjoin.html');
    exit();
}

$conn->close();
?>
