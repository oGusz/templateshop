<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../models/Template.php';

$templates = new Template();

$data = $templates->buscarPorId($idComponente);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    <?php echo  $data["codigo_css"]; ?>
  </style>
  <script>
    <?php echo  $data["codigo_js"]; ?>
  </script>
</head>

<body>


  <?php
  // $teste = ' <@@php echo "teste"; @@>';
  // $codigoExecutavel = str_replace(['<@@php ', ' @@>'], '', $teste); 

 echo $data["codigo_php"];

  //echo $data["codigo_php"];

  ?>

</body>

</html>