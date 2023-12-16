<?php
  // Include database file
  include '../admin/User.php';
  $usuariosObj = new User();
  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $usuariosObj->agregarusuario($post);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Añadir información de usuarios </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="../assets/css/img.css" rel="stylesheet">
  <link href="../assets/css/estilo.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../assets/css/all.css"/>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

<div class="container-fluid"> 
<a class="navbar-brand"><img class="logo" src="../img/900.jpg"></img></a>
  <div class ="navbar-header">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
      
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../php/carrito_2admin.php">Inicio</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown" data-bs-toggle="dropdown" aria-current="page" role="button" aria-haspopup="true" aria-expanded="false" href="#">Usuarios<span class="caret"></span></a>
        <ul class="dropdown-menu">
              <a href="../php/info_admin.php" class="dropdown-item">Mi información</a>
              <a href="../php/consulta_usuarios.php" class="dropdown-item">Editar o agregar usuarios</a>
        </ul> 
      </li>

      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> Reportes </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li class="dropdown dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
                    <li><a class="dropdown-item" href="../php/ventas3.php">Reporte de productos</a></li>
                    <li><a class="dropdown-item" href="../php/reporteproductos.php">Reporte de productos más vendidos</a></li>
                </ul>
                <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
                    <li><a class="dropdown-item" href="../php/ventas2.php">Reporte de usuarios</a></li>
                    <li><a class="dropdown-item" href="../php/reporteusuarios.php">Reporte de usuarios con mayor número de compras</a></li>
                </ul>
                <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Zonas de delivery</a>
                <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
                    <li><a class="dropdown-item" href="../php/reportescabudare.php">Reporte de zonas de Cabudare con mayor número de ventas</a></li>
                    <li><a class="dropdown-item" href="../php/reportesjosegregoriobastidas.php">Reporte de zonas de Parroquia José Gregorio Bastidas con mayor número de ventas</a></li>
                    <li><a class="dropdown-item" href="../php/reportesbarquisimeto.php">Reporte de zonas de Barquisimeto con mayor número de ventas</a></li>
                    <li><a class="dropdown-item" href="../php/reportesoeste.php">Reporte de zonas del Oeste de Barquisimeto con mayor número de ventas</a></li>
                    <li><a class="dropdown-item" href="../php/reporteaguaviva.php">Reporte de zonas de Parroquia Agua Viva con mayor número de ventas</a></li>
                </ul>
                <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventas</a>
                <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
                    <li><a class="dropdown-item" href="../php/ventas.php">Reporte de pagos</a></li>
                    <li><a class="dropdown-item" href="../php/ventas1.php">Reporte de órdenes</a></li>
                    <li><a class="dropdown-item" href="../php/reportehorariopago.php">Reporte de horarios de ventas más frecuentes</a></li>
                </ul>
            </li>
        </ul>
</li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown" data-bs-toggle="dropdown" aria-current="page" role="button" aria-haspopup="true" aria-expanded="false" href="#">Productos<span class="caret"></span></a>
        <ul class="dropdown-menu">
              <a href="../php/index_comida.php" class="dropdown-item">Editar productos</a>
              <a href="../php/index_tamaño.php" class="dropdown-item">Editar tamaño de productos</a>
              <a href="../php/index_categoria.php" class="dropdown-item">Editar tipo de categoria</a>
              <a href="../php/index_subcategoria.php" class="dropdown-item">Editar tipo de subcategoria</a>
              <a href="../php/index_impuesto.php" class="dropdown-item">Editar impuesto para producto</a>
        </ul> 
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown" data-bs-toggle="dropdown" aria-current="page" role="button" aria-haspopup="true" aria-expanded="false" href="#">Bancos<span class="caret"></span></a>
        <ul class="dropdown-menu">
        
        <a class="dropdown-item" href="../php/bancos.php">Bancos</a>

              <a href="../php/index_bancos.php" class="dropdown-item">Editar lista de bancos</a>
              <a href="../php/index_metodopago.php" class="dropdown-item">Editar lista de métodos de pago</a>
              <a href="../php/index_moneda.php" class="dropdown-item">Editar lista de tipos de moneda</a>
        </ul> 
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown" data-bs-toggle="dropdown" aria-current="page" role="button" aria-haspopup="true" aria-expanded="false" href="#">Zonas de delivery<span class="caret"></span></a>
        <ul class="dropdown-menu">
              <a class="dropdown-item" href="../php/conexiondelivery.php">Zonas de Delivery</a>
              <a href="../php/index_zonas.php" class="dropdown-item">Editar lista de zonas</a>
        </ul> 
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown" data-bs-toggle="dropdown" aria-current="page" role="button" aria-haspopup="true" aria-expanded="false" href="#">Ventas<span class="caret"></span></a>
        <ul class="dropdown-menu">
              <a href="../php/ventas.php" class="dropdown-item">Reporte de pagos</a>
              <a href="../php/ventas1.php" class="dropdown-item">Reporte de ventas</a>
              <a href="../php/reportehorariopago.php" class="dropdown-item">Reporte de horarios de ventas más frecuentes</a>
        </ul> 
      </li> -->
      
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"aria-current="page" role="button" aria-haspopup="true" aria-expanded="false" href="#">Listado de edición<span class="caret"></span></a>
        <ul class="dropdown-menu">
              <a href="info_admin.php" class="dropdown-item">Mi información</a>
              <a href="backup.php" class="dropdown-item">Crear respaldo de base de datos</a>
              <a href="consulta_usuarios.php" class="dropdown-item">Editar o agregar usuarios</a>
              <a href="index_comida.php" class="dropdown-item">Editar productos</a>
              <a href="index_bancos.php" class="dropdown-item">Editar lista de bancos</a>
              <a href="index_zonas.php" class="dropdown-item">Editar lista de zonas</a>
          </ul>

          
          
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-current="page" href="#">Listado de reportes</a>
        <div class="dropdown-menu">
              <a href="ventas.php" class="dropdown-item">Reporte de pagos</a>
              <a href="ventas1.php" class="dropdown-item">Reporte de ventas</a>
              <a href="ventas2.php" class="dropdown-item">Reporte de usuarios</a>
              <a href="ventas3.php" class="dropdown-item">Reporte de productos</a>
              <a href="reporteproductos.php" class="dropdown-item">Reporte de productos más vendidos</a>
              <a href="reportehorariopago.php" class="dropdown-item">Reporte de horarios de pago más frecuentes</a>
              <a href="reporteusuarios.php" class="dropdown-item">Reporte de usuarios con mayor número de compras</a>
          </div>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" href="../control/checkout_admin.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../php/infocarrito_2admin.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="conexiondelivery.php">Conexión Delivery</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="bancos.php">Bancos</a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../pdf/Instrucciones.pdf">Manual de Usuario</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../pdf/Bitácora.php">Bitácora de Usuario</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown" data-bs-toggle="dropdown" aria-current="page" role="button" aria-haspopup="true" aria-expanded="false" href="#">Base de datos<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <a href="../php/backup.php" class="dropdown-item">Crear respaldo de base de datos</a>
        </ul> 
      </li>

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../php/logout.php?clear=all">Salir</a>
      </li>

    </ul>

    </div>
</div>
</nav> 
<script>
  let dropdowns = document.querySelectorAll('.dropdown-toggle')
dropdowns.forEach((dd)=>{
    dd.addEventListener('click', function (e) {
        var el = this.nextElementSibling
        el.style.display = el.style.display==='block'?'none':'block'
    })
})
</script>



<div class="card text-center" style="padding:15px;">
  <h4>Añadir usuarios</h4>
</div><br> 
<div class="container">
  <form action="registrodeusuario_admi.php" method="POST">
    <div class="form-group">
      <label for="correo">Usuario:</label>
      <input type="text" class="form-control" name="usuario" placeholder="Ingresar usuario" required="">
    </div>
  
    <div class="form-group">
      <label for="horario">Clave:</label>
      <input type="text" class="form-control" type="password" minlength=8 maxlength = 8 name="clave" placeholder="Ingresar clave" required="">
    </div>

    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre " required="">
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:</label>
      <input type="text" class="form-control" name="apellido" placeholder="Ingresar apellido" required="">
    </div>
   
    <div class="form-group">
      <label for="direccion">Dirección:</label>
      <input type="text" class="form-control" name="direccion" placeholder="Ingresar dirección" required="">
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono:</label>
      <input type="text" class="form-control" onkeypress="return checkNumber(event)" maxlength="11" minlength="11" name="telefono" placeholder="Ingresar teléfono " required="">
    </div>

    <div class="form-group">
      <label for="telefono">rol:</label>
      <input type="text" class="form-control" name="rol" placeholder="Ingrese el rol" required="">
    </div>

    <div class="form-group">
      <label for="telefono">Status:</label>
      <input type="number" onKeyDown="return false" min="0" max="1" class="form-control" name="status1" value="1" required="">
      0 = Oculto, 1 = Visible
    </div>
    
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Enviar">
  </form>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
function checkNumber(event) {

var aCode = event.which ? event.which : event.keyCode;

if (aCode > 31 && (aCode < 48 || aCode > 57)) return false;

return true;

}
</script>

<script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pprecio = $form.find(".pprecio").val();
      var ptitulo = $form.find(".ptitulo").val();
      var pcantidad = $form.find(".pcantidad").val();

      $.ajax({
        url: '../control/axion_admin.php',
        method: 'post',
        data: {
          pid: pid,
          pprecio: pprecio,
          ptitulo: ptitulo,
          pcantidad: pcantidad,
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: '../control/axion_admin.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>
</html>