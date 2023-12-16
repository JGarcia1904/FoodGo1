<?php
	class delivery
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "usuarios";
		public  $con;
		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Fallo en conectar a MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}
		// Insert customer data into customer table
		public function insertData($post)
		{
			$nombre = $this->con->real_escape_string($_POST['nombre']);
			$apellido = $this->con->real_escape_string($_POST['apellido']);
			$correo = $this->con->real_escape_string($_POST['correo']);
			$direccion = $this->con->real_escape_string($_POST['direccion']);
			$telefono = $this->con->real_escape_string($_POST['telefono']);
			$horario = $this->con->real_escape_string($_POST['horario']);
			$query="INSERT INTO delibery(nombre,apellido, correo, direccion, telefono, horario) VALUES('$nombre','$apellido', '$correo', '$direccion', '$telefono', '$horario')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index_delivery.php?msg1=insert");
			}else{
			    echo "Registro falló. Intenta otra vez!";
			}
		}
		// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM delibery";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No hay registros encontrados";
		    }
		}
		// Fetch single data for edit from customer table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM delibery WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Registro no encontrado";
		    }
		}
		// Update customer data into customer table
		public function updateRecord($postData)
		{
		    $nombre = $this->con->real_escape_string($_POST['unombre']);
		    $apellido = $this->con->real_escape_string($_POST['uapellido']);
			$correo = $this->con->real_escape_string($_POST['ucorreo']);
			$direccion = $this->con->real_escape_string($_POST['udireccion']);
			$telefono = $this->con->real_escape_string($_POST['utelefono']);
			$horario = $this->con->real_escape_string($_POST['uhorario']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE delibery SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', direccion = '$direccion', telefono = '$telefono', horario = '$horario' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index_delivery.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}
		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM delibery WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index_delivery.php?msg3=delete");
		}else{
			echo "No se borra. Intenta otra vez";
		    }
		}
	}
?>