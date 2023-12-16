<?php
	session_start();
	include ("../admin/usere.php");



	
	// Add products into the cart table
	if (isset($_POST['pid'])) {
		$pid = $_POST['pid'];
		$pprecio = $_POST['pprecio'];
		$ptitulo = $_POST['ptitulo'];
		$pcantidad = $_POST['pcantidad'];
		$ptamaño = $_POST['ptamaño'];
		$precio_total = $pprecio * $pcantidad;


	    $query = $con->prepare('INSERT INTO carrito (precio,titulo,cantidad,tamaño,precio_total) VALUES (?,?,?,?,?)');
	    $query->bind_param('sssss',$pprecio,$ptitulo,$pcantidad,$ptamaño,$precio_total);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Producto añadido a tu carrito</strong>
						</div>';
	  }
	
	
	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $con->prepare('SELECT * FROM carrito');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}
	
	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $con->prepare('DELETE FROM carrito WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Producto retirado de carrito';
	  header('location:../php/infocarrito_2.php');
	}
	


	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $con->prepare('DELETE FROM carrito');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Todos los objetos han sido retirados';
	  header('location:../php/carrito_2.php');
	}
	


	// Set total price of the product in the cart table
	if (isset($_POST['cantidad'])) {
	  $cantidad = $_POST['cantidad'];
	  $pid = $_POST['pid'];
	  $ptamaño = $_POST['ptamaño'];
	  $pprecio = $_POST['pprecio'];

	  $tprecio = $cantidad * $pprecio;

	  $stmt = $con->prepare('UPDATE carrito SET cantidad=?, tamaño=?, precio_total=? WHERE id=?');
	  $stmt->bind_param('issi',$cantidad,$tamaño,$tprecio,$pid);
	  $stmt->execute();
	}
	


	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
		$nombre = $_POST['nombre'];
		$cedula = $_POST['cedula'];
		$direccion = $_POST['direccion'];
		$zona = $_POST['zona'];
		$telefono = $_POST['telefono'];
		$monto = $_POST['monto'];
		$numerotransferencia = $_POST['numerotransferencia'];
		$cedulatitular = $_POST['cedulatitular'];
		$nom_metodo = $_POST['nom_metodo'];
		$nombretitular = $_POST['nombretitular'];
		$fechatransferencia = $_POST['fechatransferencia'];
		$banco = $_POST['banco'];
		$moneda = $_POST['moneda'];
		$productos = $_POST['productos'];
  

		$data = '';

		$stmt = $con->prepare('INSERT INTO ordenes (nombre, cedula,direccion,zona,telefono, monto, numerotransferencia, cedulatitular, nombretitular, fechatransferencia, banco, nom_metodo, moneda, productos)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
		$stmt->bind_param('ssssssssssssss',$nombre, $cedula,$direccion, $zona,$telefono, $monto, $numerotransferencia, $cedulatitular, $nombretitular, $fechatransferencia, $banco, $nom_metodo,$moneda, $productos);
		$stmt->execute();
		$stmt2 = $con->prepare('DELETE FROM carrito');
		$stmt2->execute();
		$data .= '<div class="text-center">
								  <h1 class="display-4 mt-2 text-danger">¡Gracias!</h1>
								  <h2 class="text-success">¡Su pedido fue realizado de manera exitosa!</h2>
								  <h4 class="bg-danger text-light rounded p-2">Productos comprados : ' . $productos . '</h4>
								  <h4>Su nombre : ' . $nombre . '</h4>
								  <h4>Su número telefónico : ' . $telefono . '</h4>
								  <h4>Total pagado : ' . number_format($monto,2) .'$'.'</h4>
								  <h4>Tu pedido ha sido enviado. Prontó llegará a la dirección previamente indicada</h4>
								  <h4><a href="factura.php" target="_blank" >Aquí está su factura</a></h4>
							</div>';
		echo $data;
	}


?>