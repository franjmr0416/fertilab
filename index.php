<?php
session_start();
if (isset($_SESSION['nombre'])) {
  header('location: productos.php');
}

require 'services/database.php';
$db = new Database();
$connection = $db->connection();

if (isset($_POST['btnSubmit'])) {
  $emailSubmited = $_POST['email'];
  $claveSubmited = $_POST['clave'];

  $query = $connection->prepare("SELECT nombre, puesto, email FROM usuarios WHERE email = :email AND clave = :clave");
  $query->execute(['email' => $emailSubmited, 'clave' => $claveSubmited]);
  $result = $query->fetch(PDO::FETCH_ASSOC);

  if (!isset($_SESSION['nombre'])) {
    if ($result) {
      $nombre = $result['nombre'];
      $puesto = $result['puesto'];

      $_SESSION['nombre'] = $nombre;
      header("location: productos.php");
    } else {
      echo 'Usuario y/o contraseña incorrectos';
    }
  }
}

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
  <div class="d-flex py-2 px-4 bg-light bg-gradient">
    <h3>Fertilab</h3>

  </div>
  <div class="p-2 p-md-4 container d-flex justify-content-center">
    <div class="d-flex justify-content-center mt-4">
      <form method="POST">
        <div class="form-outline mb-4">
          <label class="form-label" for="email">Email</label>
          <input type="email" id="email" class="form-control" name="email" />
        </div>

        <div class="form-outline mb-4">
          <label class="form-label" for="clave">Contraseña</label>
          <input type="password" id="clave" class="form-control" name="clave" />
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4" name="btnSubmit" value="btnSubmit">Login</button>
      </form>

    </div>

  </div>
</body>


</html>