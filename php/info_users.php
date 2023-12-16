<?php  
  require_once "../admin/User.php";
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
      header('Location: carrito_2.php');
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/img.css" rel="stylesheet">
        <link href="../assets/css/estilo.css" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

          <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <title>Información de usuario</title>
</head>
<body>


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
          <a class="nav-link" href="../php/bancos_user.php">Listado de bancos</a>
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
<br>
<br>
<br>

    <div class="card text-center">
        <div class="card-header">
          <h2>
            Editar información de usuario
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
                placeholder="ingresa tu usuario">
              
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
                 <a href="config.view.php?id=<//?php echo $id?>&action=delete" class="btn btn-warning">
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
        url: '../control/action.php',
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
<?php die()?>