<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $name = $_POST['name'];
    $sec = $_POST['sel'];
    // File upload handling
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileContent = file_get_contents($fileTmpName); // Get file content

    $currentDate = date("Y-m-d");

    // Escape special characters in the input data
    $name = mysqli_real_escape_string($conn, $name);
    $sec = mysqli_real_escape_string($conn, $sec);
    $fileContent = mysqli_real_escape_string($conn, $fileContent);

    // Insert data into database
    $sql = "INSERT INTO document (type, nomdoc, date, file_content) VALUES ('$sec', '$name', '$currentDate', '$fileContent')";

    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully and data inserted into database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header( "Location: upload.html");

    // Close connection
    $conn->close();
}