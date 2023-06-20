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

// Initialize variables
$search = "";
$results = [];

// Check if a search query is submitted
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT * FROM etudiant WHERE code LIKE ?");
    $stmt->bind_param("s", $searchPattern);

    // Create the search pattern
    $searchPattern = "%$search%";

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch all rows and store them in the results array
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    // Close the statement
    $stmt->close();
}

// Fetch all students if no search query is submitted or display the search results
if (empty($search) || !empty($results)) {
    // Prepare and execute the SQL statement to fetch all students
    $stmt = $conn->prepare("SELECT * FROM etudiant");
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch all rows and store them in the results array
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Etudiants</title>
    <style>
        .search-container {
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 6px;
            width: 250px;
        }
        .student-table {
            width: 100%;
            border-collapse: collapse;
        }
        .student-table th, .student-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .student-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <form method="GET" action="alletudiant.php">
            <input type="text" name="search" placeholder="Search by code" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <table class="student-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Filiere</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name_etudiant']; ?></td>
                <td><?php echo $row['code']; ?></td>
                <td><?php echo $row['filiere_etudiant']; ?></td>
                <td>
                    <a href="updateetudiant.php?id=<?php echo $row['id']; ?>">Update</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
