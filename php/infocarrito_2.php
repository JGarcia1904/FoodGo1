<?php
  session_start();
  include_once('Converter.php');

  $converter = new Converter();
  
  $rates = $converter->getRates();
  $rates1 = $converter->getRates1();
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
        <link href="../assets/css/img.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/img.css" rel="stylesheet">
        <link href="../assets/css/estilo.css" rel="stylesheet">
        <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- importante -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index_delibery">trabajadores</a>
        </li> -->

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
  <!-- Navbar end -->
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Productos en su carrito</h4>
                </td>
              </tr>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Tamaño</th>
                <th>Precio Total</th>
                <th>
                  <a href="../control/action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('¿Seguro que quieres vaciar tu carrito?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Limpiar carrito</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require '../admin/usere.php';
                $stmt = $con->prepare('SELECT * FROM carrito');
                $stmt->execute();
                $result = $stmt->get_result();
                $monto = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><?= $row['titulo'] ?></td>
                <td>
                  <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['precio'],2); ?>
                </td>
                <input type="hidden" class="pprecio" value="<?= $row['precio'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['cantidad'] ?>" style="width:75px;">
                </td>
                <td>
                <select name="tamaño" class="ptamaño" value="<?= $row['tamaño'] ?>">
                    <option value="" disabled selected hidden>Elige</option>
                    <option value="Pequeño" <?php if ($row['tamaño']=='Pequeño'):?> selected <?php endif;?>>Pequeño</option>
					  <option value="Mediano" <?php if ($row['tamaño']=='Mediano'):?> selected <?php endif;?>>Mediano</option>
					  <option value="Grande" <?php if ($row['tamaño']=='Grande'):?> selected <?php endif;?>>Grande</option>
					</select>
                </td>
                <td><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['precio_total'],2); ?></td>
                <td>
                  <a href="../control/action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('¿Seguro que quieres retirar este producto?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $monto += $row['precio_total']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="carrito_2.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continuar
                    Comprando</a>
                </td>
                <td colspan="2"><b>Gran Total</b></td>
                <td><b><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($monto,2); ?></b></td>
                <td>
                  <a href="../control/checkout.php" class="btn btn-info <?= ($monto > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <center><h4>Conversor monetario</h4></center>
    <center><p>Escoje la moneda para realizar la conversión</p></center>
    
    <div class="container">
        <div class="moneda">
            <center><select id="moneda-uno"></center>
            <option value="AED">Dirham de los Emiratos Árabes Unidos</option>
                <option value="AFN">Afgani Afgano</option>
                <option value="ALL">Lek Albanés</option>
                <option value="AMD">Dram Armenio</option>
                <option value="ANG">Florín Antillano Neerlandés</option>
                <option value="AOA">Kwanza Angoleño</option>
                <option value="ARS">Peso Argentino</option>
                <option value="AUD">Dólar Australiano</option>
                <option value="AWG">Florín Arubeño</option>
                <option value="AZN">Manat Azerbaiyano</option>
                <option value="BAM">Marco Bosnioherzegovino</option>
                <option value="BBD">Dólar Barbadense</option>
                <option value="BDT">Taka Bangladesí</option>
                <option value="BGN">Leva Búlgara</option>
                <option value="BHD">Dinar Bareiní</option>
                <option value="BIF">Franco Burundés</option>
                <option value="BMD">Dólar Bermudeño</option>
                <option value="BND">Dólar De Brunéi</option>
                <option value="BOB">Boliviano de Bolivia</option>
                <option value="BRL">Real Brasileño</option>
                <option value="BSD">Dólar Bahameño</option>
                <option value="BTN">Ngultrum Butanés</option>
                <option value="BWP">Pula De Botsuana</option>
                <option value="BYN">Rublo Bielorruso</option>
                <option value="BZD">Dólar Beliceño</option>
                <option value="CAD">Dólar Canadiense</option>
                <option value="CDF">Franco Congoleño</option>
                <option value="CHF">Franco Suizo</option>
                <option value="CLP">Peso Chileno</option>
                <option value="CNY">Renminbi Chino</option>
                <option value="COP">Peso Colombiano</option>
                <option value="CRC">Colón Costarricense</option>
                <option value="CUC">Peso Cubano Convertible</option>
                <option value="CUP">Peso Cubano</option>
                <option value="CVE">Escudo Caboverdiano</option>
                <option value="CZK">Corona Checa</option>
                <option value="DJF">Franco Yibutiano</option>
                <option value="DKK">Corona Danesa</option>
                <option value="DOP">Peso Dominicano</option>
                <option value="DZD">Dinar Argelino</option>
                <option value="EGP">Libra Egipcia</option>
                <option value="ERN">Nakfa Eritrea</option>
                <option value="ETB">Birr Etíope</option>
                <option value="EUR">Euro</option>
                <option value="FJD">Dólar Fiyiano</option>
                <option value="FKP">Libra Malvinense</option>
                <option value="FOK">Corona Feroesa</option>
                <option value="GBP">Libra Esterlina</option>
                <option value="GEL">Lari Georgiano</option>
                <option value="GGP">Libra de Guernsey</option>
                <option value="GHS">Cedi Ghanés</option>
                <option value="GIP">Libra Gibraltareña</option>
                <option value="GMD">Dalasi Gambiano</option>
                <option value="GNF">Franco Guineano</option>
                <option value="GTQ">Quetzal Guatemalteco</option>
                <option value="GYD">Dólar Guyanés</option>
                <option value="HKD">Dólar De Hong Kong</option>
                <option value="HNL">Lempira Hondureña</option>
                <option value="HRK">Kuna Croata</option>
                <option value="HTG">Gourde Haitiano</option>
                <option value="HUF">Forinto Húngaro</option>
                <option value="IDR">Rupia Indonesia</option>
                <option value="ILS">Nuevo Séquel Israelí</option>
                <option value="IMP">Libra Manesa</option>
                <option value="INR">Rupia India</option>
                <option value="IQD">Dinar Iraquí</option>
                <option value="IRR">Rial Iraní</option>
                <option value="ISK">Corona Islandesa</option>
                <option value="JPY">Yen Japonés</option>
                <option value="KRW">Won Surcoreano</option>
                <option value="KZT">Tenge Kazajo</option>
                <option value="MXN">Peso Mexicano</option>
                <option value="MYR">Ringgit Malayo</option>
                <option value="NOK">Corona Noruega</option>
                <option value="NZD">Dolar Neozelandés</option>
                <option value="PAB">Balboa Panameña</option>
                <option value="PEN">Sol Peruano</option>
                <option value="PHP">Peso Filipino</option>
                <option value="PKR">Rupia Pakistaní</option>
                <option value="PLN">Zloty Polaco</option>
                <option value="PYG">Guaraní Paraguayo</option>
                <option value="RON">Leu Rumano</option>
                <option value="RUB">Rublo Ruso</option>
                <option value="SAR">Riyal Saudí</option>
                <option value="SEK">Corona Sueca</option>
                <option value="SGD">Dólar de Singapur</option>
                <option value="THB">Baht Tailandés</option>
                <option value="TRY">Lira Turca</option>
                <option value="TWD">Nuevo Dolar Taiwanés</option>
                <option value="UAH">Grivna Ucraniana</option>
                <option value="USD" selected >Dolar Estadounidense</option>
                <option value="UYU">Peso Uruguayo</option>
                <option value="VES">Bolívar Venezolano</option>
                <option value="VND">Dong Vietnamita</option>
                <option value="ZAR">Rand Sudafricano</option>

            </select>

            <input 
            disabled
            type="number" 
            id="cantidad-uno" 
            readonly
            placeholder="0"  
            value="<?= number_format($monto,2); ?>"
            >

        </div>
        <br>
       <center> <div class="taza-cambio-container">
            <button class="btn-primary" id="taza">
                Cambio de posiciones
            </button>

            <div class="cambio" id="cambio"></div>

        </div>
      </center>
        <br>
        <center><div class="moneda">
            <select id="moneda-dos">
                <option value="AED">Dirham de los Emiratos Árabes Unidos</option>
                <option value="AFN">Afgani Afgano</option>
                <option value="ALL">Lek Albanés</option>
                <option value="AMD">Dram Armenio</option>
                <option value="ANG">Florín Antillano Neerlandés</option>
                <option value="AOA">Kwanza Angoleño</option>
                <option value="ARS">Peso Argentino</option>
                <option value="AUD">Dólar Australiano</option>
                <option value="AWG">Florín Arubeño</option>
                <option value="AZN">Manat Azerbaiyano</option>
                <option value="BAM">Marco Bosnioherzegovino</option>
                <option value="BBD">Dólar Barbadense</option>
                <option value="BDT">Taka Bangladesí</option>
                <option value="BGN">Leva Búlgara</option>
                <option value="BHD">Dinar Bareiní</option>
                <option value="BIF">Franco Burundés</option>
                <option value="BMD">Dólar Bermudeño</option>
                <option value="BND">Dólar De Brunéi</option>
                <option value="BOB">Boliviano de Bolivia</option>
                <option value="BRL">Real Brasileño</option>
                <option value="BSD">Dólar Bahameño</option>
                <option value="BTN">Ngultrum Butanés</option>
                <option value="BWP">Pula De Botsuana</option>
                <option value="BYN">Rublo Bielorruso</option>
                <option value="BZD">Dólar Beliceño</option>
                <option value="CAD">Dólar Canadiense</option>
                <option value="CDF">Franco Congoleño</option>
                <option value="CHF">Franco Suizo</option>
                <option value="CLP">Peso Chileno</option>
                <option value="CNY">Renminbi Chino</option>
                <option value="COP">Peso Colombiano</option>
                <option value="CRC">Colón Costarricense</option>
                <option value="CUC">Peso Cubano Convertible</option>
                <option value="CUP">Peso Cubano</option>
                <option value="CVE">Escudo Caboverdiano</option>
                <option value="CZK">Corona Checa</option>
                <option value="DJF">Franco Yibutiano</option>
                <option value="DKK">Corona Danesa</option>
                <option value="DOP">Peso Dominicano</option>
                <option value="DZD">Dinar Argelino</option>
                <option value="EGP">Libra Egipcia</option>
                <option value="ERN">Nakfa Eritrea</option>
                <option value="ETB">Birr Etíope</option>
                <option value="EUR">Euro</option>
                <option value="FJD">Dólar Fiyiano</option>
                <option value="FKP">Libra Malvinense</option>
                <option value="FOK">Corona Feroesa</option>
                <option value="GBP">Libra Esterlina</option>
                <option value="GEL">Lari Georgiano</option>
                <option value="GGP">Libra de Guernsey</option>
                <option value="GHS">Cedi Ghanés</option>
                <option value="GIP">Libra Gibraltareña</option>
                <option value="GMD">Dalasi Gambiano</option>
                <option value="GNF">Franco Guineano</option>
                <option value="GTQ">Quetzal Guatemalteco</option>
                <option value="GYD">Dólar Guyanés</option>
                <option value="HKD">Dólar De Hong Kong</option>
                <option value="HNL">Lempira Hondureña</option>
                <option value="HRK">Kuna Croata</option>
                <option value="HTG">Gourde Haitiano</option>
                <option value="HUF">Forinto Húngaro</option>
                <option value="IDR">Rupia Indonesia</option>
                <option value="ILS">Nuevo Séquel Israelí</option>
                <option value="IMP">Libra Manesa</option>
                <option value="INR">Rupia India</option>
                <option value="IQD">Dinar Iraquí</option>
                <option value="IRR">Rial Iraní</option>
                <option value="ISK">Corona Islandesa</option>
                <option value="JPY">Yen Japonés</option>
                <option value="KRW">Won Surcoreano</option>
                <option value="KZT">Tenge Kazajo</option>
                <option value="MXN">Peso Mexicano</option>
                <option value="MYR">Ringgit Malayo</option>
                <option value="NOK">Corona Noruega</option>
                <option value="NZD">Dolar Neozelandés</option>
                <option value="PAB">Balboa Panameña</option>
                <option value="PEN">Sol Peruano</option>
                <option value="PHP">Peso Filipino</option>
                <option value="PKR">Rupia Pakistaní</option>
                <option value="PLN">Zloty Polaco</option>
                <option value="PYG">Guaraní Paraguayo</option>
                <option value="RON">Leu Rumano</option>
                <option value="RUB">Rublo Ruso</option>
                <option value="SAR">Riyal Saudí</option>
                <option value="SEK">Corona Sueca</option>
                <option value="SGD">Dólar de Singapur</option>
                <option value="THB">Baht Tailandés</option>
                <option value="TRY">Lira Turca</option>
                <option value="TWD">Nuevo Dolar Taiwanés</option>
                <option value="UAH">Grivna Ucraniana</option>
                <option value="USD">Dolar Estadounidense</option>
                <option value="UYU">Peso Uruguayo</option>
                <option value="VES" selected>Bolívar Venezolano</option>
                <option value="VND">Dong Vietnamita</option>
                <option value="ZAR">Rand Sudafricano</option>

            </select>

            <input 
            type="number" 
            id="cantidad-dos" 
            readonly disabled
            placeholder="0"  
            >
            <br>
            <br>
            <br>
            <br>
      </center>
        </div>
    </div>

<script src="script.js"></script>
				

      </div>
      
    </div>

  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprecio = $el.find(".pprecio").val();
      var cantidad = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: '../control/action.php',
        method: 'post',
        cache: false,
        data: {
          cantidad: cantidad,
          pid: pid,
          pprecio: pprecio
        },
        success: function(response) {
          console.log(response);
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

</html>