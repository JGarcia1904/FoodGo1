<?php
	require '../admin/usere.php';
  include '../admin/User.php';
  $query=mysqli_query($con,"SELECT nom_banco FROM bancos WHERE status2 = '1'");
  $query1=mysqli_query($con,"SELECT nom_zona FROM zonas WHERE status3 = '1'");
  $query2=mysqli_query($con,"SELECT nom_metodo FROM metodo WHERE status6 = '1'");
  $query3=mysqli_query($con,"SELECT moneda FROM moneda WHERE status7 = '1'");
	$monto = 0;
	$todosItems = '';
	$items = [];

	$sql = "SELECT CONCAT(titulo, '(',cantidad,')') AS ItemQty, precio_total FROM carrito";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $monto += $row['precio_total'];
	  $items[] = $row['ItemQty'];
	}
	$todosItems = implode(', ', $items);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/img.css" rel="stylesheet">
  <link href="../assets/css/estilo.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
 <!-- importante -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
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
  <!-- Navbar end -->
<br>
<br>
<br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Completa tu orden</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Producto(s) : </b><?= $todosItems; ?></h6>
          <h6 class="lead"><b>Gasto de Delivery : </b>Gratis</h6>
          <h5><b>Cantidad a pagar : </b><?= number_format($monto,2) ?>$</h5>
        </div>
        <form action="factura.php" method="post" id="placeOrder">
          <input type="hidden" name="productos" value="<?= $todosItems; ?>">
          <input type="hidden" name="monto" value="<?= $monto; ?>">
        </div>
        <div>
        <center><h2> Datos de comprador </h2><br></center>
        <center><label for="cedula"> Número de cédula</label></center>
			<center><input type="text" onkeypress="return checkNumber(event)"  id="cedula" name="cedula" maxlength="8" minlength="7"></center>
      <br>
        <center><label for="nombre"> Nombre del cliente</label></center>
			  <center><input type="text" id="nombre" name="nombre"></center>
          <br>
        <center><label for="direccion"> Dirección del cliente</label></center>
			<center><input type="text" id="direccion" name="direccion"></center>
      <br>
      <div>
        <center><label for="zona">Zona de residencia del cliente</label></center>
        <center><select name="zona" id="zona" required></center>
        <option value="" disabled selected="selected" hidden>Elige</option>
          <?php
          while($datos = mysqli_fetch_array($query1))
          {
            ?>
            <option value =<?php echo $datos["nom_zona"] ?>><?php echo $datos["nom_zona"] ?></option>
            <?php
          }
          ?>
					</select>
				</div>
        <br>
      <center><label for="telefono"> Teléfono</label></center>
			<center><input type="text" onkeypress="return checkNumber(event)" id="telefono" name="telefono" maxlength="11" minlength="11"></center>
      <br>
      </div>
      <div class="formfield">
        <br>
      <center><h3>Datos de pago</h3></center><br>
      <center><label for="cedulatitular">Cédula del titular de la cuenta</label></center>
			<center><input type="text" onkeypress="return checkNumber(event)" maxlength="8" minlength="7" id="cedulatitular" name="cedulatitular"></center>
      <br>
			<center><label for="numerotransferencia">Número de referencia</label></center>
			<center><input type="text" onkeypress="return checkNumber(event)" id="numerotransferencia" name="numerotransferencia"></center>
      <br>
      <center><label for="nombretitular">Nombre del titular de la cuenta</label></center>
			<center><input type="text" id="nombretitular" name="nombretitular"></center>
      <br>
			<div class="payment">
				<div>
        <center><label for="banco">Banco del que hizo la transferencia</label></center>
        <center><select name="banco" id="banco" required></center>
        <option value="" hidden selected="selected">Elige</option>
          <?php
          while($datos = mysqli_fetch_array($query))
          {
            ?>
            <option value =<?php echo $datos["nom_banco"] ?>><?php echo $datos["nom_banco"] ?></option>
            <?php
          }
          ?>
					</select>
				</div>
        <br>
        <div>
        <center><label for="metodo">Método de pago</label></center>
        <center><select name="nom_metodo" id="nom_metodo" required></center>
        <option value="" hidden selected="selected">Elige</option>
          <?php
          while($datos = mysqli_fetch_array($query2))
          {
            ?>
            <option value =<?php echo $datos["nom_metodo"] ?>><?php echo $datos["nom_metodo"] ?></option>
            <?php
          }
          ?>
					</select>
				</div>
        <br>
        <div>
        <center><label for="moneda">Moneda usada para pago</label></center>
        <center><select name="moneda" id="moneda" required></center>
        <option value="" hidden selected="selected">Elige</option>
          <?php
          while($datos = mysqli_fetch_array($query3))
          {
            ?>
            <option value =<?php echo $datos["moneda"] ?>><?php echo $datos["moneda"] ?></option>
            <?php
          }
          ?>
					</select>
				</div>
        <br>
				<div>
        <center><label for="fechatransferencia">Día de transferencia</label></center>
        <center><input type="date" required max="<?=date('Y-m-d')?>" id="fechatransferencia" name="fechatransferencia"></center>
				</div>
        <br>
          </div>
          <div class="form-group">
            <input type="submit" id = "submit" name="submit" value="Hacer pedido" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script>
var $input = $('input:text'),
    $register = $('#submit');

$register.attr('disabled', true);
$input.keyup(function() {
    var trigger = false;
    $input.each(function() {
        if (!$(this).val()) {
            trigger = true;
        }
    });
    trigger ? $register.attr('disabled', true) : $register.removeAttr('disabled');
});
</script>


<script>
var $input = $('input:date'),
    $register = $('#submit');

$register.attr('disabled', true);
$input.keyup(function() {
    var trigger = false;
    $input.each(function() {
        if (!$(this).val()) {
            trigger = true;
        }
    });
    trigger ? $register.attr('disabled', true) : $register.removeAttr('disabled');
});
</script>

<!-- <script>
$('#submit').attr('disabled', 'disabled');

function updateFormEnabled() {
    if (verifyAdSettings()) {
        $('#submit').attr('disabled', '');
    } else {
        $('#submit').attr('disabled', 'disabled');
    }
}

function verifyAdSettings() {
    if ($('#zona').val() != '' && $('#banco').val() != '') {
        return true;
    } else {
        return false
    }
}

$('#banco').change(updateFormEnabled);

$('#zona').change(updateFormEnabled);
    </script> -->


  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'axion_admin.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });


    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'axion_admin.php',
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
<script type="text/javascript">
function checkNumber(event) {

var aCode = event.which ? event.which : event.keyCode;

if (aCode > 31 && (aCode < 48 || aCode > 57)) return false;

return true;

}
</script>
  
</body>

</html>