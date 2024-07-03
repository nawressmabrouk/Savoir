<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222831;
            color: white;
        }

        .container {
            display: flex;
            flex-direction: row;
            padding: 20px;
        }

        #main-content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .buttons {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .create-room-button,
        .join-room-button {
            background-color: transparent;
            color: white;
            border: 1px solid #17c3b2;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .create-room-button:hover,
        .join-room-button:hover {
            background-color: #17c3b2;
            color: black;
        }

        .button-common {
            background-color: transparent;
            color: white;
            border: 1px solid #17c3b2;
            padding: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            align-items: center; 
        }

        .button-common:hover {
            background-color: #17c3b2;
            color: black;
            align-items: center; 
        }

        .disconnect-button {
            background-color: transparent;
            color: white;
            border: 1px solid #f04747;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
            align-items: center; 
        }

        .disconnect-button:hover {
            background-color: #f04747;
            color: black;
            align-items: center; 
        }

        .connect-button {
            background-color: transparent;
            color: white;
            border: 1px solid #17c3b2;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: auto;
            align-items: center; 
            flex-grow: 1; 
        }

        .connect-button:hover {
            background-color: #17c3b2;
            color: black;
            align-items: center; 
        }

        #joined-room-container {
            background-color: #393e46;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            color: white;
            font-size: 2em;
            font-weight: bold;
        }

        ul.room-list {align-items: center;
            list-style-type: none;
            flex-grow: 1; 
        }

        ul.room-list li { 
            display: flex;
            align-items: center; /* Align items vertically */
            margin-bottom: 10px; /* Add space between rooms */
            flex-grow: 1; 
        }

        .room-name {
            flex-grow: 1; /* Allow room name to take up remaining space */
        }

        .button-small {
            padding: 5px 10px;
        }
        
    </style>
</head>
<body>

    <div class="container">
        <div id="main-content">


    <h2>chat box</h2>

<?php
session_start() ;
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
    //$email=$_SESSION['email'];
    //$code=$_SESSION['connectedroom'];

/*
if ($code==''){}
*/

//session_start();

    
    $email=$_SESSION['email'];

   // $email="ronaldo";
    $code=$_SESSION['connectedroom'];
 
 $sql = "SELECT * FROM msg where idroom='$code'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo"$code";
    echo "<table border='1'>";
    echo "<tr><th>etudiant : </th><th>message </th><th>";
    while($row = $result->fetch_assoc()) {



    $sql1 = "SELECT * FROM etudiant WHERE email='" . $row['email'] . "'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

        echo "<tr>";
        echo "<td>" . $row1["fullname"]/* $row["email"] .*/ ."</td>";
        echo "<td>"  .$row["text"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No messages yet.";
}






?>






    <form action="" method="post">
        <input type="text" id="msg" name="msg">
        <input type="submit" value="Submit">
    </form>


    <?php
            
                $msg = $_POST['msg'];
                // Insert the message into the database
                if($msg!=''){
                $sql_insert = "INSERT INTO msg (idroom, email, text) VALUES ('$code', '$email', '$msg')";
                if ($conn->query($sql_insert) === TRUE) {
                    echo "<p>Message sent successfully.</p>";
                    
                } else {
                    echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }
                echo "<script>
            setTimeout(function() {
                window.location.href = 'msgbox.php';
            }, 100); 
        </script>";
            }
                $conn->close();
            ?>
   

    </div>
    <div>


    </body>
</html>