<?php  
  require "../admin/User.php";

  $a = new User();

  if (!empty($_POST['username']) && !empty($_POST['password']) &&
      !empty($_POST['nombre']) && !empty($_POST['apellido']) && 
      !empty($_POST['direccion']) && !empty($_POST['telefono'])
      && !empty($_POST['rol'])
    ) 
  {
    try {
      $a->insertar_usuario_contrasena();
  
      header('Location: login.php');      
    } catch (Exception $e) {
      $message = $e->getMessage();
      echo "<div class=\"alerta alerta-danger\">$message</div>";
    }
  }else{
    $alerta = "<script>alert('Recuerda: Si quieres registrarte, no puedes dejar espacios vacíos');</script>";
    echo $alerta;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
    <title>Registro</title>
   
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  
  <body>
    <h1>Regístrate</h1>

    <span> ¿Tienes cuenta? 
      <a href="login.php">
        Inicia Sesión
      </a>
    </span>

    <form action="signup.php"  method="POST">
      <input name="username" type="text" placeholder="Ingrese su Usuario">
    
      <input name="password" type="password" minlength=8 maxlength = 8 placeholder="Ingrese su Contraseña">
    
      <input name="nombre" type="text" placeholder="Ingrese su Nombre">
    
      <input name="apellido" type="text" placeholder="Ingrese su Apellido">
    
      <input name="direccion" type="text" placeholder="Ingrese su Dirección">
    
      <input name="telefono" type="text" onkeypress="return checkNumber(event)" maxlength="11" minlength="11" placeholder="Ingrese su número telefónico">
      
      <input name="rol" type="hidden" value="2" readonly="readonly">
           
      <input name="status1" type="hidden" value="1" readonly="readonly">
          
      <input type="submit" value="Registrar">
    </form>




<script type="text/javascript">
function checkNumber(event) {

var aCode = event.which ? event.which : event.keyCode;

if (aCode > 31 && (aCode < 48 || aCode > 57)) return false;

return true;

}
</script>



  </body>
</html>
