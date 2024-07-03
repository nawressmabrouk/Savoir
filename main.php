<?php
session_start();


// Check if 'email' key is set in the session
if (!isset($_SESSION['email'])) {
    // Redirect to a login page or handle the case where the email is not set
    // For example, you can redirect to a login page:
    header("Location: sl.html");
    exit(); // Make sure to exit after redirection
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoir";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['type'])) {
    $type = $_POST['type'];
    // Proceed with your code using $type
} else {
    // Handle the case when 'type' is not set in $_POST
    echo "Type is not set in the POST data.";
}

$nomd = $_POST['searchbar'];
$email = $_SESSION['email'];
$sql0 = "SELECT fullname FROM etudiant WHERE email='$email'";
$res0 = $conn->query($sql0);
$row0 = $res0->fetch_assoc();
$name = $row0['fullname'];
$date = date('Y-m-d');

echo $name;
    


//reserch begin

// Check if $nomd is not empty and $type is not 'option0'
if ($nomd !== '' && $type !== 'option0') {
    $query = "SELECT * FROM document WHERE type='$type' AND nomdoc='$nomd'";
    $sqlr="INSERT INTO recherche(recherche_text,type,email,date)VALUES('$nomd','$type','$email','$date')";
        $resultr = $conn->query($sqlr);
} else {
    // Check if $type is 'option0'
    if ($type == 'option0'  && $nomd == '') {
        // If $nomd is empty and $type is 'option0', select all documents
        $query = "SELECT * FROM document";
    } else {
        // If $nomd is empty but $type is not 'option0', select documents by type
        $query = "SELECT * FROM document WHERE type='$type'";
        
    }
}

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $matrix=[];

    while ($row = $result->fetch_assoc()) {
   

    $sql0 = "SELECT * FROM comment WHERE iddoc='" . $row['iddoc'] . "'";
        
    
    $result0 = $conn->query($sql0);

    
    $commentmat=[];
    if ($result0 && $result0->num_rows > 0) {
        
       
        while($row0 = $result0->fetch_assoc()){
            $comment =array(
                'nom_comenter' => $name,
                'comment' => $row0['text'],
                'date' => $row0['date'],
                'evaluation' => $row0['evaluation']
            );
        


        $commentmat[]=$comment;
        }

    }


        $line =array(
                'iddoc' => $row['iddoc'],
                'nomdoc' => $row['nomdoc'],
                'file_content' => $row['file_content'],
                'date' => $row['date'] ,
                'comments'=> $commentmat );
            $matrix[] = $line;
    
        }
    }
    $_SESSION['doc'] = $matrix;// Set matrix in session
    


header( "Location: main.html");
/*
// Convert array to JSON
echo json_encode($documents);
} else {
    echo json_encode(array('error' => 'No messages found.'));
}*/

$conn->close();

?>
