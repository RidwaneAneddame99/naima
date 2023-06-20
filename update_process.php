<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scolaire";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$id = $_POST['id'];
$name = $_POST['name'];
$filiere = $_POST['filiere'];
$responsable = $_POST['responsable'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("UPDATE class SET name = ?, filiere = ?, responsable = ? WHERE id = ?");
$stmt->bind_param("sssi", $name, $filiere, $responsable, $id);

// Execute the statement
if ($stmt->execute()) {
    // Success message
    echo "<script>alert('Data updated successfully!');</script>";
} else {
    // Error message
    echo "<script>alert('Error updating data: " . $conn->error . "');</script>";
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
