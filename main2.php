<?php
session_start();

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

function transformLink($url) {
    // Extract the file name from the URL
    $fileName = basename(parse_url($url, PHP_URL_PATH));

    // Remove any URL-encoded characters from the file name
    $decodedFileName = urldecode($fileName);

    // Remove file extension if present (assuming it's a PDF)
    $formattedName = preg_replace('/\.pdf$/i', '', $decodedFileName);

    // Replace underscores or hyphens with spaces
    $formattedName = str_replace(['_', '-'], ' ', $formattedName);

    // Capitalize the first letter of each word
    $formattedName = ucwords($formattedName);

    // Add the ".pdf" extension back
    $transformedLink = $formattedName . '.pdf';

    return $transformedLink;
}


$matrix = $_SESSION['doc'];

if (is_array($matrix) && !empty($matrix)) {
    // Output the HTML with CSS classes for styling
    echo '<html>';
    echo '<head>';
    echo '<link rel="stylesheet" type="text/css" href="main.css">'; // Link to your CSS file
    echo '</head>';
    echo '<body>';
    foreach ($matrix as $row) {
        $exampleUrl = $row['file_content'];
        // Transform the link for each document
        $transformedLink = transformLink($exampleUrl);
    
        echo '<div class="cards">';
        echo '<div class="card">';
       
        echo '<div class="docname">' . $row['nomdoc'] . '</div>';
    
        echo '<div class="body"><a href="' . $transformedLink . '" download>' . $row['nomdoc'] . '</a></div>';
        echo '<div class="date">' . $row['date'] . '</div>';
        
        if (!empty($row['comments'])) {
            echo '<div class="comments-container">'; // Container for comments
            // Iterate through comments array for this document
            echo " <h3>comments  </h3>";
            foreach ($row['comments'] as $comment) {
                echo '<div class="comment">';
                
                
                echo '<div class="commenter">' . $comment['nom_comenter'] . '</div>';
                echo '<div class="comment-date">' . $comment['date'] . '</div>';
                echo '<div class="comment-text">' ."comment :". $comment['comment'] . '</div>';
                echo '<div class="comment-text">' ."evaluation :". $comment['evaluation'] . '</div>';

                echo '</div>';
                echo " <h3>------------------------------------------------------------</h3>";
            }
            
            echo '</div>'; // Close comments container
        }
        echo " <h3 style='text-align:center;'>Add comment</h3>";
        echo '<form action="addcomment.php" method="post">
        <input type="hidden" name="iddoc" value="' . $row['iddoc'] . '">
        <div>Evaluation :
            1 star :
            <input type="radio" id="rating1" name="rating" value="1">
            2 stars :
            <input type="radio" id="rating2" name="rating" value="2">
            3 stars:
            <input type="radio" id="rating3" name="rating" value="3">
            4 stars:
            <input type="radio" id="rating4" name="rating" value="4">
            5 stars:
            <input type="radio" id="rating5" name="rating" value="5">
        </div>
    
        <div>
        <input type="text" placeholder="Add a comment..." id="comment" name="comment">
        </div>
        
        <div>
           <input type="submit" value="send">
        </div>
    </form>';
        echo '</div>'; // Close the card
        echo '</div>'; // Close the cards container
    }
    

    echo '</body>';
    echo '</html>';
}

$conn->close();
?>
