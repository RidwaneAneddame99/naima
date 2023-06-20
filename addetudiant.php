<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add etudiant</title>
    <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
    }

    form {
      width: 300px;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #333333;
    }

    input[type="text"] {
      width: 100%;
      padding: 5px;
      border-radius: 3px;
      border: 1px solid #cccccc;
    }

    button[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      background-color: #4285f4;
      color: #ffffff;
      cursor: pointer;
      margin-top:20px;
      
    }
  </style>
</head>
<body>
<form action="process2.php" method="POST">
   

    <label for="name">Name:</label>
    <input type="text" id="name" name="name_etudiant" required><br>

    <label for="code">code:</label>
    <input type="text" id="code" name="code" required><br>

    
    <label for="filiere">Filiere:</label>
    <select id="filiere" name="filiere_etudiant" required>
      <?php
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

      // Fetch class names from the database
      $sql = "SELECT name FROM class";
      $result = $conn->query($sql);

      // Loop through the class names and create options
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
          }
      }

      // Close the connection
      $conn->close();
      ?>
    </select><br>

    <button type="submit" >Submit</button>  
</body>
</html>