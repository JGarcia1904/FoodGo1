<?php session_start();
include ("../admin/User.php");
$a = new User();
$b = $a->connect();

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/img.css" rel="stylesheet">
        <link href="../assets/css/estilo.css" rel="stylesheet">
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
          <a class="nav-link active" aria-current="page" href="info_users.php">Editar información de usuario</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../control/checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="infocarrito_2.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../php/zonas_user.php">Listado de zonas de delivery</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="bancos_user.php">Listado de bancos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pdf/Instrucciones.pdf">Manual de Usuario</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pdf/Bitácora.php">Bitácora de Usuario</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php?clear=all">Salir</a>
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

  <!-- Displaying Products Start -->
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include '../admin/usere.php';
  			$stmt = $con->prepare('SELECT * FROM articulos WHERE status1 = 1');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="../img/<?= $row['img'] ?>" class="card-img-top" height="250">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['nombre'] ?></h4>
              <h5 class="card-text text-center text-info"><?= $row['precio'] ?>$</h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Cantidad : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pcantidad" value="<?= $row['cantidad'] ?>">
                  </div>
                  <div class="col-md-6 py-1 pl-4">
                    <b>Tamaño : </b>
                  </div>
                  <div class="col-md-6">
                    <select name="tamaño" class="form-control ptamaño" value="<?= $row['tamaño'] ?>">

					  <option value="Pequeño">Pequeño</option>
					  <option value="Mediano">Mediano</option>
					  <option value="Grande">Grande</option>
					</select>
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="ptitulo" value="<?= $row['nombre'] ?>">
                <input type="hidden" class="pprecio" value="<?= $row['precio'] ?>">
                <input type="hidden" class="ptamaño" value="<?= $row['tamaño'] ?>">
                <input type="hidden" class="pimg" value="<?= $row['img'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Añadir a carrito</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>

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
      var ptamaño = $form.find(".ptamaño").val();
      var pcantidad = $form.find(".pcantidad").val();

      $.ajax({
        url: '../control/action.php',
        method: 'post',
        data: {
          pid: pid,
          pprecio: pprecio,
          ptitulo: ptitulo,
          ptamaño: ptamaño,
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
        url: '../control/action.php',
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