<?php
$today = date("Y-m-d");
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
        <h1>Nuevo producto</h1>
      </div>
      <div class="col-auto">
        <a href="index.php" class="btn btn-danger w-auto">Cancelar</a>
      </div>
    </div>
    <div class="container mt-2">
      <div class="abs-center">
        <form action="services/upsert.php" method="POST" class="form">
          <div class="form-group mt-2">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" required>
          </div>
          <div class="form-group mt-2">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" placeholder="descripción" name="descripcion" required>
          </div>
          <div class="form-group mt-2">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" placeholder="$00.0" name="precio" required>
          </div>
          <input type="hidden" value="<?php echo $today; ?>" id="fecha_creacion" name="fecha_creacion">
          <div class="mt-2">
            <button type="submit" class="btn btn-success w-auto">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>