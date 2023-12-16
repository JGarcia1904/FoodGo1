<?php
  
  // Include database file
  require '../admin/usere.php';
  include '../admin/User.php';
  $comidaObj = new User();
  $query=mysqli_query($con,"SELECT tamaño FROM tamaños WHERE status4 = '1'");
  $query1=mysqli_query($con,"SELECT subcategoria FROM subcategoria WHERE status5 = '1'");
  $query2=mysqli_query($con,"SELECT categoria FROM categoria WHERE status8 = '1'");
  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $comida = $comidaObj->displayData($editId);
  }
  // Update Record in customer table
  if(isset($_POST['update'])) {
    $comidaObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actualizar información de producto</title>
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Actualizar información de producto</h4>
</div><br> 
<div class="container">
  <form action="edit_comida.php" method="POST">
    <div class="form-group">
      <label for="nombre">Nombre de producto:</label>
      <input type="text" class="form-control" name="unombre" value="<?php echo $comida['nombre']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="precio">Precio:</label>
      <input type="text" class="form-control" name="uprecio" value="<?php echo $comida['precio']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="img">Imagen</label>
      <input type="text" class="form-control" name="uimg" value="<?php echo $comida['img']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="cantidad">Cantidad de inicio en el carrito</label>
      <input type="text" class="form-control" name="ucantidad" readonly="readonly" value="1" required="">
    </div>
    
    <div class="form-group">
      
      <label for="tamaño">Tamaño</label>
      <select name="utamaño" id="utamaño" required="">
      <option value="" disabled hidden>Elige el tamaño</option>
      <option selected hidden value =<?php echo $comida['tamaño']; ?>> <?php echo $comida['tamaño']; ?>
      <?php
          while($datos2 = mysqli_fetch_array($query))
          {
            ?>
            <option value =<?php echo $datos2["tamaño"] ?>><?php echo $datos2["tamaño"] ?>
            <?php
          }
          ?>
					</select>
    </div>

    <div class="form-group">
      <label for="categoria">Categoría</label>
      <select name="ucategoria" id="ucategoria" onchange="val_changed()" required="">
      <option value="" disabled hidden>Elige la categoría principal del alimento</option>
            <option selected hidden value =<?php echo $comida['categoria']; ?>> <?php echo $comida['categoria']; ?>   
        <?php
          while($datos = mysqli_fetch_array($query2))
          {
            ?>
            <option value =<?php echo $datos["categoria"] ?>><?php echo $datos["categoria"] ?>
            <?php
          }
          ?>
					</select>
    </div>
    <script>
function val_changed()
        {
        var ucategoria=$('#ucategoria').val();

        }
</script>

<script>
function val_changed1()
        {
        var usubcategoria=$('#usubcategoria').val();

        }
</script>

    <div class="form-group">
      <label for="subcategoria">Subcategoría</label>
      <select name="usubcategoria" id="usubcategoria" onchange="val_changed1()" required="">
      <option value="" disabled hidden>Elige la subcategoría del alimento</option>
			<option selected hidden value =<?php echo $comida['subcategoria']; ?>> <?php echo $comida['subcategoria']; ?>   
              <?php
          while($datos1 = mysqli_fetch_array($query1))
          {
            ?>
            <option value =<?php echo $datos1["subcategoria"]?>><?php echo $datos1["subcategoria"] ?>
            <?php
          }
          ?>
					</select>
    </div>



    <div class="form-group">
      <label for="">Status</label>
      <input type="number" class="form-control"  onKeyDown="return false" min="0" max="1" name="ustatus" value="<?php echo $comida['status1'] ?>"required="">
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