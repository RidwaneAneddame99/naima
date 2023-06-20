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

// Prepare and bind the SQL statement for class insertion
$stmt1 = $conn->prepare("INSERT INTO class (name, filiere, responsable) VALUES (?, ?, ?)");
$stmt1->bind_param("sss", $name, $filiere, $responsable);

// Get the form data for class insertion
$name = $_POST['name'];
$filiere = $_POST['filiere'];
$responsable = $_POST['responsable'];

// Execute the class insertion statement
if ($stmt1->execute()) {
    // Success message for class insertion
    echo "<script>alert('Class data sent successfully!');</script>";
} else {
    // Error message for class insertion
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}

// Prepare and bind the SQL statement for student insertion
$stmt2 = $conn->prepare("INSERT INTO etudiant (name_etudiant, code, filiere_etudiant) VALUES (?, ?, ?)");
$stmt2->bind_param("sss", $name_etudiant, $code, $filiere_etudiant);

// Get the form data for student insertion
$name_etudiant = $_POST['name_etudiant'];
$code = $_POST['code'];
$filiere_etudiant = $_POST['filiereetudiant'];

// Execute the student insertion statement
if ($stmt2->execute()) {
    // Success message for student insertion
    echo "<script>alert('Student data sent successfully!');</script>";
} else {
    // Error message for student insertion
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}

// Close the statements and the connection
$stmt1->close();
$stmt2->close();
$conn->close();
?>
