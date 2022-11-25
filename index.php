<?php
require 'services/database.php';
$db = new Database();
$connection = $db->connection();
$getProductos = $connection->query("SELECT id, nombre, descripcion, precio, fecha_creacion FROM productos order by id asc");

$getProductos->execute();
$result = $getProductos->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <title>Fertilab</title>
</head>

<body>
  <div class="p-4">
    <div class="row align-items-center">
      <div class="col">
        <h1>Productos</h1>
      </div>
      <div class="col-auto">
        <a href="addProduct.php" class="btn btn-primary w-auto">Nuevo</a>
      </div>
    </div>
    <div class="row p-4">
      <table class="table table-border">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Fecha creación</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nombre'] . '</td>';
            echo '<td>' . $row['descripcion'] . '</td>';
            echo '<td>' . $row['precio'] . '</td>';
            echo '<td>' . $row['fecha_creacion'] . '</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>