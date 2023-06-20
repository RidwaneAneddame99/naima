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

// Check if the ID parameter exists
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("DELETE FROM class WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Record deleted successfully
        echo "<script>alert('Record deleted successfully!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        // Error deleting record
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }

    // Close the statement
    $stmt->close();
} else {
    // ID parameter not found
    echo "<script>alert('ID parameter not found!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
}

// Close the connection
$conn->close();
?>
