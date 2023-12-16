<?php
  
  // Include database file
  require '../admin/usere.php';
  include '../admin/User.php';
  $comidaObj = new User();
  $query=mysqli_query($con,"SELECT impuesto FROM impuesto WHERE status9 = '1'");
  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $comida = $comidaObj->displayData8($editId);
  }
  // Update Record in customer table
  if(isset($_POST['update'])) {
    $comidaObj->updateRecord8($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actualizar información de impuesto</title>
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Actualizar información de impuesto</h4>
</div><br> 
<div class="container">
  <form action="edit_impuesto.php" method="POST">
    <div class="form-group">
      <label for="nombre">Nombre de impuesto:</label>
      <input type="text" class="form-control" name="uimpuesto" value="<?php echo $comida['impuesto']; ?>" required="">
    </div>

    <div class="form-group">
      <label for="nombre">Valor de impuesto:</label>
      <input type="text" class="form-control" name="uvalor"  onkeypress="return isNumber(event)" value="<?php echo $comida['valor']; ?>" required="">
    </div>

    <div class="form-group">
      <label for="">Status</label>
      <input type="number" class="form-control"  onKeyDown="return false" min="0" max="1" name="ustatus9" value="<?php echo $comida['status9'] ?>"required="">
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
<script type="text/javascript">
function isNumber(event) {
   var theEvent = event || window.event;
   var key = theEvent.keyCode || theEvent.which;            
   var keyCode = key;
   key = String.fromCharCode(key);          
   if (key.length == 0) return;
   var regex = /^[0-9.\b]+$/;            
   if(keyCode == 188 || keyCode == 190){
      return;
   }else{
      if (!regex.test(key)) {
         theEvent.returnValue = false;                
         if (theEvent.preventDefault) theEvent.preventDefault();
      }
    }    
 }
</script>
</body>
</html>