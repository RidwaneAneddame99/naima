<?php
// Retrieve the ID and data from the query parameters
$id = $_GET['id'];
$name = $_GET['name'];
$filiere = $_GET['filiere'];
$responsable = $_GET['responsable'];
?>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <form action="update_process.php" method="POST" style="margin: 20px;">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label for="name" style="display: block; margin-bottom: 10px;">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" style="padding: 5px; width: 200px; margin-bottom: 10px;">
    
    <label for="filiere" style="display: block; margin-bottom: 10px;">Filiere:</label>
    <input type="text" id="filiere" name="filiere" value="<?php echo htmlspecialchars($filiere); ?>" style="padding: 5px; width: 200px; margin-bottom: 10px;">
    
    <label for="responsable" style="display: block; margin-bottom: 10px;">Responsable:</label>
    <input type="text" id="responsable" name="responsable" value="<?php echo htmlspecialchars($responsable); ?>" style="padding: 5px; width: 200px; margin-bottom: 10px;">
    
   <button type="submit" style="padding: 8px 12px; background-color: #4CAF50; color: white; border: none;">Update</button>
  </form> 
</div>
