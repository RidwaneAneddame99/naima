<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>schole7</title>
</head>
<body>
<?php 
 $baseURL = 'http://' . $_SERVER['HTTP_HOST'];
 $urladdclass = $baseURL . '/scolaire/addclass.php';
 ?>
 <div class="divp" >
    <div class="div1">
      <a href="<?php print $urladdclass ?>" target="_blank"><button>add class</button></a>
      <a href="./addetudiant.php" target="_blank"><button>add etudiant</button></a>
      <a href="./allclass.php" target="_blank"><button>all class</button></a>
      <a href="./alletudiant.php" target="_blank"><button>all etudiant</button></a>
    </div>
 </div>
</body>
</html>