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
  <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <title>Menú</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/img.css" rel="stylesheet">
        <link href="../assets/css/estilo.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
 <!-- importante -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand"><img class="logo" src="../img/900.jpg"></img></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      
 <!--        <li class="nav-item">
          <a class="nav-link active">Menú</a>
        </li> -->
    
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../php/carrito_2.php">Inicio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../php/info_users.php">Editar información de usuario</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index_delibery">trabajadores</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../php/infocarrito_2.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../php/zonas_user.php">Listado de zonas de delivery</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../php/bancos_user.php">Listado de bancos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pdf/Instrucciones.pdf">Manual de Usuario</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pdf/Bitácora.php">Bitácora de Usuario</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../php/logout.php?clear=all">Salir</a>
        </li>

      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" id="buscar" name="buscar" onkeyup="buscar_ahora($('#buscar').val());" type="search" placeholder="buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form> -->
    </div>
  </div>
</nav>
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
        <form action="" method="post" id="placeOrder">
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
            <input type="submit" id = "submit" name="submit"  value="Hacer pedido" class="btn btn-danger btn-block">
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

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
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
        url: 'action.php',
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