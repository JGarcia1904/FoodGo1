<?php 

require '../admin/User.php';
require '../control/controler.php';



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<title>Iniciar Sesión</title>
</head>
<body>
	<br><br><br>
	<h1>
		Iniciar Sesión
	</h1>

  <form action="login.php" method="post">
		<input type="text" name="username" placeholder="ingrese su usuario">

		<input type="password" name="password" placeholder="Ingrese su Contraseña">

		<input type="submit" name="submit" value="Ingresar" onclick="saludo()">

		<p>¿Aún no tienes cuenta?</p>

    <a href="signup.php">¡Regístrate!</a>
	</form>

<!-- 	<script>
		function saludo()
		{
			alert("BIENVENIDO A FOODGO!!");		
		};
	</script> -->
</body>
</html>