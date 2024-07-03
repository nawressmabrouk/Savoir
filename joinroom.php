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
    //$email="ronaldo";
    $joincode = $_POST['code'];
    $sql0 = "SELECT idroom FROM room WHERE idroom = $joincode";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
    if($row0['idroom'] == null){
        echo"room doesnt exist";
        // header('Location: a.php');
        exit();
    }






    $sql = "INSERT INTO joinedroom (idroom,email) VALUES ('$joincode', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "room joined successfully";

        header('Location: a.php');
        exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        // Close connection
        $conn->close();
    
    
    



    ?>