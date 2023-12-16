<?php
  
  // Include database file
  include '../admin/User.php';
  $deliveryObj = new User();
  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $delivery = $deliveryObj->displyaRecordByI($editId);
  }
  // Update Record in customer table
  if(isset($_POST['update'])) {
    $deliveryObj->update($_POST);
    header("Location: Consulta_usuarios.php");
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actualizar Informacion</title>
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Actualizar Informacion</h4>
</div><br> 
<div class="container">
  <form action="edit_usuario.php" method="POST">

    <div class="form-group">
      <label for="nombre">Usuario:</label>
      <input type="text" class="form-control" name="uusuario" value="<?php echo $delivery['usuario']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="nombre">Clave:</label>
      <input type="text" class="form-control" name="uclave" value="<?php echo $delivery['clave']; ?>" required="">
    </div>


    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" name="unombre" value="<?php echo $delivery['nombre']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:</label>
      <input type="text" class="form-control" name="uapellido" value="<?php echo $delivery['apellido']; ?>" required="">
    </div>
    
    <div class="form-group">
      <label for="direccion">Dirección:</label>
      <input type="text" class="form-control" name="udireccion" value="<?php echo $delivery['direccion']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono:</label>
      <input type="text" class="form-control" name="utelefono" value="<?php echo $delivery['telefono']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="rol">Rol:</label>
      <input type="number" class="form-control" onKeyDown="return false" min="1" max="2" name="urol" value="<?php echo $delivery['rol']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="">Status</label>
      <input type="number" class="form-control"  onKeyDown="return false" min="0" max="1" name="ustatus" value="<?php echo $delivery['status1'] ?>"required="">
      0 = Baneado, 1 = Activo
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