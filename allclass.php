<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
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

// Fetch all classes from the database
$sql = "SELECT * FROM class";
$result = $conn->query($sql);

// Check if any results were found
if ($result->num_rows > 0) {
    echo "<table class='class-table'>";
    echo "<tr><th>ID</th><th>Name</th><th>Filiere</th><th>Responsable</th><th>Actions</th></tr>";

    // Loop through the results and display each class in a table row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['filiere'] . "</td>";
        echo "<td>" . $row['responsable'] . "</td>";
        echo "<td>";
        echo "<button onclick=\"location.href='update.php?id=" . $row['id'] . "&name=" . urlencode($row['name']) . "&filiere=" . urlencode($row['filiere']) . "&responsable=" . urlencode($row['responsable']) . "';\">Update</button>";

        echo "<button onclick=\"if (confirm('Are you sure you want to delete this record?')) { window.location.href='delete.php?id=" . $row['id'] . "'; }\">Delete</button>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No classes found.";
}

// Close the connection
$conn->close();
?>


</body>
</html>