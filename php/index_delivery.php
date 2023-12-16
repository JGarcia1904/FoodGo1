<?php
  
  // Include database file
  include '../admin/delivery.php';
  $deliveryObj = new delivery();
  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $deliveryObj->deleteRecord($deleteId);
  }
     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabla de trabajadores de delivery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Tabla de trabajadores de delivery</h4>
</div><br><br> 
<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              La información del trabajador fue añadida exitosamente
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              La información del trabajador fue actualizada exitosamente
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Información de trabajador borrada de manera exitosa
            </div>";
    }
  ?>
  <h2>Ver registro de trabajadores de delivery
    <a href="add_delivery.php" class="btn btn-primary" style="float:right;">Añadir trabajador de delivery</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre de trabajador</th>
        <th>Apellido de trabajador</th>
        <th>Correo de trabajador</th>
        <th>Dirección de trabajador</th>
        <th>Número telefónico de trabajador</th>
        <th>Horario de trabajo</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $deliverys = $deliveryObj->displayData(); 
          foreach ($deliverys as $delivery) {
        ?>
        <tr>
          <td><?php echo $delivery['id'] ?></td>
          <td><?php echo $delivery['nombre'] ?></td>
          <td><?php echo $delivery['apellido'] ?></td>
          <td><?php echo $delivery['correo'] ?></td>
          <td><?php echo $delivery['direccion'] ?></td>
          <td><?php echo $delivery['telefono'] ?></td>
          <td><?php echo $delivery['horario'] ?></td>
          <td>
            <a href="edit_delivery.php?editId=<?php echo $delivery['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="index_delivery.php?deleteId=<?php echo $delivery['id'] ?>" style="color:red" onclick="confirm('¿Seguro que quieres borrar este registro?')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>