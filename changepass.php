<?php
session_start(); // Start the session

if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    echo "Please log in first.";
    exit();
}

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

$oldPwd = $_POST['old_password'];
$newPwd = $_POST['new_password'];
$confirmPwd = $_POST['confirm_password'];

$email = $_SESSION['email'];

// Fetch the user record from the database
$sql = "SELECT * FROM etudiant WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dbPassword = $row['password'];

    // Verify old password
    if ($oldPwd === $dbPassword) {
        // Old password matches, proceed with updating the password
        // Make sure $newPwd and $confirmPwd match before updating the database
        if ($newPwd === $confirmPwd) {
            // Update the password in the database
            $updateSql = "UPDATE etudiant SET password = '$newPwd' WHERE email = '$email'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Password updated successfully.";
                echo "<script>setTimeout(function() { window.location.href = 'main.html'; }, 2000);</script>";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "New password and confirm password do not match.";
        }
    } else {
        echo "Old password is incorrect.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>

