<?php  
  require("../admin/User.php");
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die();
}

extract($_SESSION['user']);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if ( !empty($_POST['usuario']) &&
    !empty($_POST['clave']) &&
    !empty($_POST['nombre']) &&
    !empty($_POST['apellido']) &&  
    !empty($_POST['direccion']) &&
    !empty($_POST['telefono'])
  ) 
  {
    try {
      $User = new User();
      $User->updateUser();
      header('Location: carrito_2admin.php');
    } catch (Exception $e) {
      $message = $e->getMessage();
      echo "<div class=\"alerta alerta-danger\">$message</div>";
    }
  }
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    try {
      if(isset($_GET['id'])){
        if(!is_null($_GET['id'])){
          $User = new User();
          $User->deleteUser($_GET['id']);
          unset( $_SESSION['user']);
        }
      }
    } catch (Exception $e) {
      $message = $e->getMessage();
      echo "<div class=\"alerta alerta-danger\">$message</div>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="../assets/css/img.css" rel="stylesheet">
    <link href="../assets/css/estilo.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
    <title>Información de administrador</title>
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
<br>
<br>
<br>




    <div class="card text-center">
        <div class="card-header">
          <h2>
            Editar información de administrador
          </h2>
        </div>
        <div class="card-body">
          <form class="row g-3" method="POST" action="">
              <input type="text" class="d-none"
                value="<?php echo $id ?>"
                name="id"
              >
           
            <div class="form-floating mb-3">
              <input type="text" readonly="readonly" class="form-control"
                id="" value="<?php echo $usuario ?>"
                name="usuario"
                placeholder="Ingresa tu usuario">
              
              <label for="">Usuario</label>
            </div>
            
            <div class="form-floating">
              <input type="password" class="form-control"
              value="<?php echo $clave ?>" name="clave"
              id="floatingPassword" placeholder="Ingresa tu clave">
              
              <label for="floatingPassword">Clave</label>
            </div>
            
            <div class="form-floating">
              <input type="text" class="form-control" readonly="readonly"
              value="<?php echo $nombre ?>" name="nombre"
              id="floatingPassword" placeholder="Ingresa tu nombre">
              
              <label for="floatingPassword">Nombre</label>
            </div>
            
            <div class="form-floating">
              <input type="text" class="form-control" readonly="readonly"
              value="<?php echo $apellido ?>" name="apellido"
              id="floatingPassword" placeholder="Ingresa tu apellido">
              
              <label for="floatingPassword">Apellido</label>
            </div>
            
            <div class="form-floating">
              <input type="text" class="form-control"
              value="<?php echo $direccion ?>" name="direccion"
              id="floatingPassword" placeholder="Ingresa tu Dirección">
              
              <label for="floatingPassword">Dirección</label>
            </div>

            <div class="form-floating">
              <input type="tel" onkeypress="return checkNumber(event)" maxlength="11" minlength="11" class="form-control"
              value="<?php echo $telefono ?>" name="telefono"
              id="floatingPassword" placeholder="Ingresa tu Teléfono">
              
              <label for="floatingPassword">Teléfono</label>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary w-100" onclick="saludo()">
                Actualizar
              </button>
            </div>
    
            <!-- <div class="col-12">
              <a href="config.view_admin.php?id=<//?php echo $id?>&action=delete" class="btn btn-danger w-100">
                Eliminar usuario
              </button>
            </div> -->
          </form>
        </div>
      </div>
      <script>
        function saludo()
        {
          alert("Su informacion fue actualizada");


        };
      </script>

<script type="text/javascript">
function checkNumber(event) {

var aCode = event.which ? event.which : event.keyCode;

if (aCode > 31 && (aCode < 48 || aCode > 57)) return false;

return true;

}
</script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

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
<?php die()?>