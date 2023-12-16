<?php
  
  // Include database file
  include '../admin/delivery.php';
  $deliveryObj = new delivery();
  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $delivery = $deliveryObj->displyaRecordById($editId);
  }
  // Update Record in customer table
  if(isset($_POST['update'])) {
    $deliveryObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actualizar info de trabajadores de delivery</title>
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Actualizar info de trabajadores de delivery</h4>
</div><br> 
<div class="container">
  <form action="edit_delivery.php" method="POST">
    <div class="form-group">
      <label for="nombre">Nombre de trabajador de delivery:</label>
      <input type="text" class="form-control" name="unombre" value="<?php echo $delivery['nombre']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="apellido">Apellido de trabajador de delivery:</label>
      <input type="text" class="form-control" name="uapellido" value="<?php echo $delivery['apellido']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="correo">Correo de trabajador de delivery:</label>
      <input type="text" class="form-control" name="ucorreo" value="<?php echo $delivery['correo']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="direccion">Dirección de trabajador de delivery:</label>
      <input type="text" class="form-control" name="udireccion" value="<?php echo $delivery['direccion']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono de trabajador de delivery:</label>
      <input type="text" class="form-control" name="utelefono" value="<?php echo $delivery['telefono']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="horario">Horario de trabajador de delivery:</label>
      <input type="text" class="form-control" name="uhorario" value="<?php echo $delivery['horario']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $delivery['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Actualizar">
    </div>
  </form>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>