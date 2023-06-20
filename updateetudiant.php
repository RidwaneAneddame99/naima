<!DOCTYPE html>
<html>
<head>
    <title>Update Etudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .update-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 4px;
        }
        .update-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .update-form label {
            display: block;
            margin-bottom: 8px;
        }
        .update-form input[type=text] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .update-form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .update-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="update-form">
        <h2>Update Etudiant</h2>
        <form action="update_process2.php" method="POST">
            <?php
            // Retrieve the form data using $_POST superglobal
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $code = isset($_POST['code']) ? $_POST['code'] : '';
            $filiere = isset($_POST['filiere']) ? $_POST['filiere'] : '';
            ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            <label for="code">Code:</label>
            <input type="text" id="code" name="code" value="<?php echo htmlspecialchars($code); ?>" required>
            <label for="filiere">Filiere:</label>
            <input type="text" id="filiere" name="filiere" value="<?php echo htmlspecialchars($filiere); ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
