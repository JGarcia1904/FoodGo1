<?php
  
  // Include database file
  require '../admin/usere.php';
  include '../admin/User.php';
  $comidaObj = new User();
  $query=mysqli_query($con,"SELECT nom_metodo FROM metodo WHERE status6 = '1'");
  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $comida = $comidaObj->displayData5($editId);
  }
  // Update Record in customer table
  if(isset($_POST['update'])) {
    $comidaObj->updateRecord5($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actualizar información de método de pago</title>
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Actualizar información de método de pago</h4>
</div><br> 
<div class="container">
  <form action="edit_metodopago.php" method="POST">
    <div class="form-group">
      <label for="nombre">Tipo de método de pago:</label>
      <input type="text" class="form-control" name="unom_metodo" value="<?php echo $comida['nom_metodo']; ?>" required="">
    </div>


    <div class="form-group">
      <label for="">Status</label>
      <input type="number" class="form-control"  onKeyDown="return false" min="0" max="1" name="ustatus6" value="<?php echo $comida['status6'] ?>"required="">
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