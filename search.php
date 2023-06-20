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

// Get the search query
$searchQuery = $_POST['search'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("SELECT * FROM etudiant WHERE code LIKE ?");
$stmt->bind_param("s", $search);

// Add wildcard characters to the search query
$search = '%' . $searchQuery . '%';

// Execute the statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Check if any results were found
if ($result->num_rows > 0) {
    // Loop through the results and display the student information
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name_etudiant'] . "<br>";
        echo "Code: " . $row['code'] . "<br>";
        echo "Filiere: " . $row['filiere_etudiant'] . "<br>";
        echo "--------------------------<br>";
    }
} else {
    echo "No students found.";
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
