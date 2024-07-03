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

// Now you can set session variables
$email = $_SESSION['email'];


$searchDate = date("Y-m-d"); // Obtient la date actuelle au format "année-mois-jour"

$sql = "SELECT document.nomdoc, document.date FROM document, recherche WHERE document.date > recherche.date  AND recherche.date = '$searchDate'";

$searchResult = $conn->query($sql);

if ($searchResult->num_rows == 0) {
    echo "Pas de documents trouvés.";
} else {
    $successMessageDisplayed = false; // Variable to track if success message has been displayed

    while ($row = $searchResult->fetch_assoc()) {
        $nomdoc = $row['nomdoc'];
        $dateAdded = $row['date'];

        if ($dateAdded > $searchDate) {
            // Insert notification into the database
            $insertQuery = "INSERT INTO notification (email, notif, date) VALUES ('$email', 'document  $nomdoc is now available ', NOW())";
            if ($conn->query($insertQuery) === TRUE && !$successMessageDisplayed) {
                echo "Notification ajoutée avec succès.";
                $successMessageDisplayed = true; // Set flag to true to indicate success message has been displayed
            } elseif (!$successMessageDisplayed) {
                echo "Erreur lors de l'ajout de la notification: " . $conn->error;
            }
        }
    }
}

?>