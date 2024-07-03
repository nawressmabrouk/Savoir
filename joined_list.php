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
    
    
    // Now you can set session variables
    $email=$_SESSION['email'];
   // $email="ronaldo";
    


    $sql = "SELECT * FROM joinedroom where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>code de room</th><th>numero de room </th><th>nom de room</th></tr>";
    while($row = $result->fetch_assoc()) {



    $sql1 = "SELECT * FROM room WHERE idroom='" . $row['idroom'] . "'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

        echo "<tr>";
        echo "<td>" . $row["idroom"] . "</td>";
        echo "<td>"  .$row["nbrjoined"] . "</td>";
        echo "<td>" .$row1["msg"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();



?>