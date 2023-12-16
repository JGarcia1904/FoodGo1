<?php
  // Include database file
  include '../admin/delivery.php';
  $deliveryObj = new delivery();
  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $deliveryObj->insertData($_POST);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Añadir info de trabajdores de delivery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Añadir info de de trabajadores de delivery</h4>
</div><br> 
<div class="container">
  <form action="add_delivery.php" method="POST">
    <div class="form-group">
      <label for="nombre">Nombre de trabajador:</label>
      <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre de trabajador" required="">
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:</label>
      <input type="text" class="form-control" name="apellido" placeholder="Ingresar apellido de trabajador" required="">
    </div>
    <div class="form-group">
      <label for="correo">Correo:</label>
      <input type="text" class="form-control" name="correo" placeholder="Ingresar correo de trabajador" required="">
    </div>
    <div class="form-group">
      <label for="direccion">Dirección:</label>
      <input type="text" class="form-control" name="direccion" placeholder="Ingresar dirección de trabajador" required="">
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono:</label>
      <input type="text" class="form-control" name="telefono" placeholder="Ingresar teléfono de trabajador" required="">
    </div>
    <div class="form-group">
      <label for="horario">Horario de trabajo:</label>
      <input type="text" class="form-control" name="horario" placeholder="Ingresar horario de trabajo" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Enviar">
  </form>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>