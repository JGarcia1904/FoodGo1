<?php
  
  // Include database file
  include '../admin/User.php';
  $comidaObj = new User();
  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $comida = $comidaObj->displayData2($editId);
  }
  // Update Record in customer table
  if(isset($_POST['update'])) {
    $comidaObj->updateRecord2($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actualizar información de zona de residencia</title>
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Actualizar información de zonas de residencias</h4>
</div><br> 
<div class="container">
  <form action="edit_zonas.php" method="POST">
    <div class="form-group">
      <label for="nombre">Nombre de zona de residencia:</label>
      <input type="text" class="form-control" name="unom_zona" value="<?php echo $comida['nom_zona']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="img">Imagen</label>
      <input type="text" class="form-control" name="uimg" value="<?php echo $comida['img']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="info_zona">Información de zona de residencia</label>
      <input type="text" class="form-control" name="uinfo_zona" value="<?php echo $comida['info_zona']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="">Status</label>
      <input type="number" class="form-control"  onKeyDown="return false" min="0" max="1" name="ustatus3" value="<?php echo $comida['status3'] ?>"required="">
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