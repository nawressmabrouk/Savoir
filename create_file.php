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

    // Now you can set session variables
    $email=$_SESSION['email'];
    //$email='ronaldo';
    
    $nameroom = $_POST['rname'];
   do {
        $code = rand(10000, 99999);
        $sql0 = "SELECT idroom FROM room WHERE idroom = $code";
        $result0 = $conn->query($sql0);
        $row0 = $result0->fetch_assoc();
    } while ($row0['idroom'] != null);
    
    $sql = "INSERT INTO room VALUES ('$code', '$email', '$nameroom')";
    

    if ($conn->query($sql) === TRUE) {
        $sql2 = "INSERT INTO joinedroom (idroom,email) VALUES ('$code', '$email')";
        $result2 = $conn->query($sql2);
        echo "room created";

     /*   $htmlContent = '<!DOCTYPE html>
    <html lang="en">
        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New HTML File</title>
</head>
            <body>
    <h1>This is a new HTML file created by PHP!</h1>
        </body>
</html>';

    // Save the content to a new HTML file
    $fileName = 'C:\xampp\htdocs\savoir\new_file.html';
    file_put_contents($fileName, $htmlContent);

   */
    header('Location: a.php');
    exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();


?>