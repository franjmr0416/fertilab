<?php
session_start();
if (isset($_SESSION['nombre'])) {
  $usuarioLogeado = $_SESSION['nombre'];
} else {
  header('location: index.php');
}
require 'services/database.php';
$db = new Database();
$connection = $db->connection();

$id = $_GET['id'];
$query = $connection->prepare("DELETE FROM productos WHERE id=?");
$isDone = false;
if ($query->execute([$id])) {
  $isDone = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <title>Fertilab</title>
</head>

<body>
  <div class="p-4">
    <div class="row align-items-center">
      <div class="col">
        <?php
        echo $isDone ? '<h2>Eliminado exitosamente</h2>' : '<h2>Error al eliminar</h2>';
        ?>
      </div>

    </div>
    <div class="row">
      <div class="col-auto">
        <a href="productos.php" class="btn btn-secondary w-auto">Ver productos</a>
      </div>
    </div>
  </div>
</body>

</html>