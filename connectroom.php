<?php 
session_start();
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
    //session_start();

    // Now you can set session variables
    $email=$_SESSION['email'];
   // $email="ronaldo";
    $c=$_POST['code2'];
    $sql0 = "SELECT idroom FROM joinedroom WHERE idroom = '$c' and email='$email'";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
    if($row0['idroom'] == null){
        echo"room doesnt exist";
        
        
        exit();
    }else{
        //echo $c;
       $_SESSION['connectedroom']=$c; 
       sleep(1);
       header("Location: a.php");
        exit();
       
    }






    
    
    $conn->close();
    
    
    
    
    
    
    
    
    
    ?>