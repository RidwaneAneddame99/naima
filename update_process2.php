<?php
// Assuming you have a database connection already established
// Replace the placeholders with your actual database credentials
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Retrieve the form data
$id = $_POST['id'];
$name = $_POST['name'];
$code = $_POST['code'];
$filiere = $_POST['filiere'];

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the update query
$sql = "UPDATE etudiant SET name='$name', code='$code', filiere='$filiere' WHERE id='$id'";

// Execute the update query
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
