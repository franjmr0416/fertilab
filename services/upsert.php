<?php
session_start();
if (isset($_SESSION['nombre'])) {
  $usuarioLogeado = $_SESSION['nombre'];
} else {
  header('location: ../index.php');
}
require 'database.php';

$db = new Database();
$connection = $db->connection();

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$fecha_creacion = $_POST['fecha_creacion'];

if ($_POST['id'] != 0) {
  $id = $_POST['id'];
  $query = $connection->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, fecha_creacion=? WHERE id =?");
  $result = $query->execute(array($nombre, $descripcion, $precio, $fecha_creacion, $id));
} else {
  $query = $connection->prepare("INSERT INTO productos(nombre, descripcion, precio, fecha_creacion) 
  VALUES(:nom, :descr, :pre, :fech)");
  $result = $query->execute(array('nom' => $nombre, 'descr' => $descripcion, 'pre' => $precio, 'fech' => $fecha_creacion));
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
        $message = $result ? '<h2>Agregado exitosamente</h2>' : '<h2>Error al agregar</h2>';
        echo $message;
        ?>
      </div>

    </div>
    <div class="row">
      <div class="col-auto">
        <a href="../productos.php" class="btn btn-secondary w-auto">Ver productos</a>
      </div>
      <div class="col-auto">
        <a href="../addProduct.php" class="btn btn-primary w-auto">Agregar producto</a>
      </div>
    </div>
  </div>
</body>

</html>