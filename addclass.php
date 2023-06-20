<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add class</title>
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
<form action="process.php" method="POST">
   

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="filiere">Filiere:</label>
    <input type="text" id="filiere" name="filiere" required><br>

    <label for="responsable">Responsable:</label>
    <input type="text" id="responsable" name="responsable" required><br>

    <button type="submit" >Submit</button>  
</body>
</html>