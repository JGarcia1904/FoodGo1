<?php
  
  // Include database file
  include '../admin/User.php';
  $comidaObj = new User();
  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $comida = $comidaObj->displayData1($editId);
  }
  // Update Record in customer table
  if(isset($_POST['update'])) {
    $comidaObj->updateRecord1($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actualizar información de banco</title>
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Actualizar información de bancos</h4>
</div><br> 
<div class="container">
  <form action="edit_bancos.php" method="POST">
    <div class="form-group">
      <label for="nombre">Nombre de banco:</label>
      <input type="text" class="form-control" name="unom_banco" value="<?php echo $comida['nom_banco']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="nombre">Número de cuenta:</label>
      <input type="text" onkeypress="return checkNumber(event)" class="form-control" name="unum_cuenta" value="<?php echo $comida['num_cuenta']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="nombre">RIF:</label>
      <input type="text" class="form-control" name="urif" value="<?php echo $comida['rif']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="nombre">Tipo de cuenta:</label>
      <input type="text" class="form-control" name="utipo" value="<?php echo $comida['tipo']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="nombre">Número telefónico:</label>
      <input type="text" onkeypress="return checkNumber(event)" min=11 max=11 class="form-control" name="utlf" value="<?php echo $comida['tlf']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="nombre">Imagen:</label>
      <input type="text" class="form-control" name="uimg" value="<?php echo $comida['img']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="">Status</label>
      <input type="number" class="form-control"  onKeyDown="return false" min="0" max="1" name="ustatus2" value="<?php echo $comida['status2'] ?>"required="">
      0 = Oculto, 1 = Visible
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $comida['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Actualizar">
    </div>
    
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>