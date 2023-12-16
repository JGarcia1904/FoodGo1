<?php

class User
{


  private $servidor;
  private $username;
  private $password;
  private $database;
  
 
  private $conn;
  
 
   public function __construct()
     {
      $this->servidor ='localhost';
      $this->username ='root';
      $this->password ='';
      $this->database ='usuarios';
     }
 

    public function connect()
      {
          $conn = new mysqli($this->servidor,$this->username,$this->password,$this->database);	
          if ($conn->connect_error) {
            die('Error de Conexión (' . $conn->connect_errno . ') '
                  . $conn->connect_error);
      }
          
          return $conn;
      }

      public function disconnect($conetion)
      {
        $conetion->close();
      }
     
     
      public function insertar_usuario_contrasena()
      {
        try {
          $conn= $this->connect();
          extract($_POST);

          $user = $this->getUser($username, $password);
          if($user != false && isset($user['id'])){
            throw new Exception("El usuario ya existe. Escoja otro nombre de usuario", 1);
          }          
          
          $stmt = $conn->prepare('INSERT INTO datos( usuario, clave ,nombre ,apellido ,direccion ,telefono, rol, status1 ) VALUES(?,?,?,?,?,?,?,?)');
          $stmt->bind_param( 'sssssssi',$username ,$password ,$nombre, $apellido, $direccion, $telefono,$rol,$status1 );
          $stmt->execute();
          return true;
        } catch (Exception $e) {
          return throw new Exception($e->getMessage(), 1);
        }
      }


      public function insertar_registro()
      {
        try {
          $conn= $this->connect();
          extract($_POST);      
          $stmt = $conn->prepare('INSERT INTO registro(cedula, telefono, monto, numerotransferencia, cedulatitular, nombretitular, fechatransferencia, banco, zona) VALUES(?,?,?,?,?,?,?,?,?)');
          $stmt->bind_param( 'sssssssss', $cedula, $telefono, $monto, $numerotransferencia, $cedulatitular,$nombretitular, $fechatransferencia, $banco,$zona);
          $stmt->execute();
          return true;
        } catch (Exception $e) {
          return throw new Exception($e->getMessage(), 1);
        }
      }

      public function getUser($username,$password='')
      {

        $conn= $this->connect();
        $sql = "SELECT * FROM datos WHERE usuario = '$username' AND clave='$password'AND status1=1";
        if($password === ''){
          $sql = "SELECT * FROM datos WHERE usuario = '$username' OR id='$username' AND status1=1";
        }
        # If user not exist return false
        $results = $conn->query($sql);
        if ($results == false){
          return false;
        }
        
        $user = $results->fetch_assoc();
        if(isset($user['rol'])){
        $user['rolName'] = $user['rol'];
        }

        return $user;
      }

      public function getRolusuario($id)
      {

        $conn= $this->connect();
        $sql="SELECT rol FROM `roles` WHERE roles.id = $id";
        
        # If user not exist return false
        $results = $conn->query($sql);
        if ($results == false){
          return false;
        }
        
        $rolname = $results->fetch_assoc();
        

        return $rolname;
      }

      public function mostrarbanco(){
        $this->conn = $this->connect();
        $query = "SELECT * FROM bancos";
        $result = $this->conn->query($query);
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

      public function mostrarzona(){
        $this->conn = $this->connect();
        $query = "SELECT * FROM zonas";
        $result = $this->conn->query($query);
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

      public function updateUser()
      {
        try {
          $conn= $this->connect();
          extract($_POST);
          
          if($_SESSION['user']['usuario'] !== $usuario){
            # search username is free
            $user = $this->getUser($usuario);
            if($user != false && isset($user['id'])){
              throw new Exception("Usuario ya existe", 1);
            }
          }
          
          if(!isset($id)){
            return throw new Exception("Usuario no encontrado", 1);
          }

          $stmt = $conn->prepare("UPDATE datos
          SET usuario = ?, clave  = ?, nombre = ?, apellido = ?, direccion = ?, telefono = ?
          WHERE id = ?");
          $stmt->bind_param( 'ssssssi',$usuario ,$clave ,$nombre, $apellido, $direccion, $telefono, $id );
          $stmt->execute();
          $this->refreshDataSession($_SESSION['user']['id']);
          return true;
        } catch (Exception $e) {
          return throw new Exception($e->getMessage(), 1);
        }
      }
      public function deleteUser($id)
      {
        try {
          $conn= $this->connect();
          
          if(!isset($id)){
            return throw new Exception("Usuario a eliminar no encontrado", 1);
          }
          $stmt = $conn->prepare("DELETE FROM datos WHERE id = ?");
          $stmt->bind_param( 'i', $id );
          $stmt->execute();
          return true;
        } catch (Exception $e) {
          return throw new Exception($e->getMessage(), 1);
        }
      }
      function refreshDataSession($id){
        try {
          $user = $this->getUser($id);
          $_SESSION['user'] = $user;
          
          if($user != false && !isset($user['id'])){
            throw new Exception("Error ha ocurrido actualizando el usuario", 1);
          }          
          return true;

        } catch (Exception $e) {
          return throw new Exception($e->getMessage(), 1);
        }
      }



      public function insertData($post)
      {
        $this->conn = $this->connect();
        $nombre = $this->conn->real_escape_string($_POST['nombre']);
        $precio = $this->conn->real_escape_string($_POST['precio']);
        $img = $this->conn->real_escape_string($_POST['img']);
        $cantidad = $this->conn->real_escape_string($_POST['cantidad']);
        $tamaño = $this->conn->real_escape_string($_POST['tamaño']);
        $categoria = $this->conn->real_escape_string($_POST['categoria']);
        $subcategoria = $this->conn->real_escape_string($_POST['subcategoria']);
        $status1 = $this->conn->real_escape_string($_POST['status1']);
        $query="INSERT INTO articulos(nombre,precio,img,cantidad,tamaño,categoria, subcategoria, status1) VALUES('$nombre','$precio','$img',$cantidad,'$tamaño','$categoria', '$subcategoria',$status1)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_comida.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData1($post)
      {
        $this->conn = $this->connect();
        $nom_banco = $this->conn->real_escape_string($_POST['nom_banco']);
        $num_cuenta = $this->conn->real_escape_string($_POST['num_cuenta']);
        $rif = $this->conn->real_escape_string($_POST['rif']);
        $tipo = $this->conn->real_escape_string($_POST['tipo']);
        $tlf = $this->conn->real_escape_string($_POST['tlf']);
        $img = $this->conn->real_escape_string($_POST['img']);
        $status2 = $this->conn->real_escape_string($_POST['status2']);
        $query="INSERT INTO bancos(nom_banco, num_cuenta,rif,tipo,tlf,img, status2) VALUES('$nom_banco','$num_cuenta','$rif','$tipo', '$tlf','$img',$status2)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_bancos.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData2($post)
      {
        $this->conn = $this->connect();
        $nom_zona = $this->conn->real_escape_string($_POST['nom_zona']);
        $info_zona = $this->conn->real_escape_string($_POST['info_zona']);
        $img = $this->conn->real_escape_string($_POST['img']);
        $status3 = $this->conn->real_escape_string($_POST['status3']);
        $query="INSERT INTO zonas(nom_zona, info_zona, img, status3) VALUES('$nom_zona','$info_zona','$img',$status3)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_zonas.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData3($post)
      {
        $this->conn = $this->connect();
        $tamaño = $this->conn->real_escape_string($_POST['tamaño']);
        $status4 = $this->conn->real_escape_string($_POST['status4']);
        $query="INSERT INTO tamaños(tamaño, status4) VALUES('$tamaño',$status4)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_tamaño.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData4($post)
      {
        $this->conn = $this->connect();
        $subcategoria = $this->conn->real_escape_string($_POST['subcategoria']);
        $status5 = $this->conn->real_escape_string($_POST['status5']);
        $query="INSERT INTO subcategoria(subcategoria, status5) VALUES('$subcategoria',$status5)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_subcategoria.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData5($post)
      {
        $this->conn = $this->connect();
        $nom_metodo = $this->conn->real_escape_string($_POST['nom_metodo']);
        $status6 = $this->conn->real_escape_string($_POST['status6']);
        $query="INSERT INTO metodo(nom_metodo, status6) VALUES('$nom_metodo',$status6)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_metodopago.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData6($post)
      {
        $this->conn = $this->connect();
        $moneda = $this->conn->real_escape_string($_POST['moneda']);
        $status7 = $this->conn->real_escape_string($_POST['status7']);
        $query="INSERT INTO moneda(moneda, status7) VALUES('$moneda',$status7)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_moneda.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData7($post)
      {
        $this->conn = $this->connect();
        $categoria = $this->conn->real_escape_string($_POST['categoria']);
        $status8 = $this->conn->real_escape_string($_POST['status8']);
        $query="INSERT INTO categoria(categoria, status8) VALUES('$categoria',$status8)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_categoria.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }

      public function insertData8($post)
      {
        $this->conn = $this->connect();
        $impuesto = $this->conn->real_escape_string($_POST['impuesto']);
        $valor = $this->conn->real_escape_string($_POST['valor']);
        $status9 = $this->conn->real_escape_string($_POST['status9']);
        $query="INSERT INTO impuesto(impuesto, valor, status9) VALUES('$impuesto','$valor','$status9')";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index_impuesto.php?msg1=insert");
        }else{
            echo "Registro falló. Intenta otra vez!";
        }
      }



      public function deleteRecord($id)
		{   $this->conn = $this->connect();
		    $query = "DELETE FROM articulos WHERE id = '$id'";
		    $sql = $this->conn->query($query);
		if ($sql==true) {
			header("Location:index_comida.php?msg3=delete");
		}else{
			echo "No se borra. Intenta otra vez";
		    }
		}

    public function displayData($id)
		{   $this->conn = $this->connect();
      $query = "SELECT * FROM articulos WHERE id = '$id'";
      $result = $this->conn->query($query);
        if ($result->num_rows > 0)
         {
            $row = $result->fetch_assoc();
            return $row;
         }else
          {
                   echo "Registro no encontrado";
		      }
     }

     public function displayData1($id)
     {   $this->conn = $this->connect();
       $query = "SELECT * FROM bancos WHERE id = '$id'";
       $result = $this->conn->query($query);
         if ($result->num_rows > 0)
          {
             $row = $result->fetch_assoc();
             return $row;
          }else
           {
                    echo "Registro no encontrado";
           }
      }

      public function displayData2($id)
      {   $this->conn = $this->connect();
        $query = "SELECT * FROM zonas WHERE id = '$id'";
        $result = $this->conn->query($query);
          if ($result->num_rows > 0)
           {
              $row = $result->fetch_assoc();
              return $row;
           }else
            {
                     echo "Registro no encontrado";
            }
       }

       public function displayData3($id)
       {   $this->conn = $this->connect();
         $query = "SELECT * FROM tamaños WHERE id = '$id'";
         $result = $this->conn->query($query);
           if ($result->num_rows > 0)
            {
               $row = $result->fetch_assoc();
               return $row;
            }else
             {
                      echo "Registro no encontrado";
             }
        }

        public function displayData4($id)
        {   $this->conn = $this->connect();
          $query = "SELECT * FROM subcategoria WHERE id = '$id'";
          $result = $this->conn->query($query);
            if ($result->num_rows > 0)
             {
                $row = $result->fetch_assoc();
                return $row;
             }else
              {
                       echo "Registro no encontrado";
              }
         }

         public function displayData5($id)
         {   $this->conn = $this->connect();
           $query = "SELECT * FROM metodo WHERE id = '$id'";
           $result = $this->conn->query($query);
             if ($result->num_rows > 0)
              {
                 $row = $result->fetch_assoc();
                 return $row;
              }else
               {
                        echo "Registro no encontrado";
               }
          }

          public function displayData6($id)
          {   $this->conn = $this->connect();
            $query = "SELECT * FROM moneda WHERE id = '$id'";
            $result = $this->conn->query($query);
              if ($result->num_rows > 0)
               {
                  $row = $result->fetch_assoc();
                  return $row;
               }else
                {
                         echo "Registro no encontrado";
                }
           }

          public function displayData7($id)
           {   $this->conn = $this->connect();
             $query = "SELECT * FROM categoria WHERE id = '$id'";
             $result = $this->conn->query($query);
               if ($result->num_rows > 0)
                {
                   $row = $result->fetch_assoc();
                   return $row;
                }else
                 {
                          echo "Registro no encontrado";
                 }
            }

            public function displayData8($id)
            {   $this->conn = $this->connect();
              $query = "SELECT * FROM impuesto WHERE id = '$id'";
              $result = $this->conn->query($query);
                if ($result->num_rows > 0)
                 {
                    $row = $result->fetch_assoc();
                    return $row;
                 }else
                  {
                           echo "Registro no encontrado";
                  }
             }
 

    public function updateRecord($postData)
		{   $this->conn = $this->connect();
		    $nombre = $this->conn->real_escape_string($_POST['unombre']);
		    $precio = $this->conn->real_escape_string($_POST['uprecio']);
        $img = $this->conn->real_escape_string($_POST['uimg']);
        $cantidad = $this->conn->real_escape_string($_POST['ucantidad']);
        $tamaño = $this->conn->real_escape_string($_POST['utamaño']);
        $categoria = $this->conn->real_escape_string($_POST['ucategoria']);
        $subcategoria = $this->conn->real_escape_string($_POST['usubcategoria']);
        $status1 = $this->conn->real_escape_string($_POST['ustatus']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE articulos SET nombre = '$nombre', precio = '$precio', img= '$img', cantidad='$cantidad', tamaño ='$tamaño', categoria='$categoria', subcategoria='$subcategoria', status1='$status1' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_comida.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord1($postData)
		{   $this->conn = $this->connect();
		    $nom_banco = $this->conn->real_escape_string($_POST['unom_banco']);
        $num_cuenta = $this->conn->real_escape_string($_POST['unum_cuenta']);
        $rif = $this->conn->real_escape_string($_POST['urif']);
        $tipo = $this->conn->real_escape_string($_POST['utipo']);
        $tlf = $this->conn->real_escape_string($_POST['utlf']);
        $img = $this->conn->real_escape_string($_POST['uimg']);
        $status2 = $this->conn->real_escape_string($_POST['ustatus2']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE bancos SET nom_banco = '$nom_banco', num_cuenta = '$num_cuenta', rif='$rif',tipo='$tipo', tlf='$tlf', img='$img',status2='$status2' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_bancos.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord2($postData)
		{   $this->conn = $this->connect();
		    $nom_zona = $this->conn->real_escape_string($_POST['unom_zona']);
        $info_zona = $this->conn->real_escape_string($_POST['uinfo_zona']);
        $img = $this->conn->real_escape_string($_POST['uimg']);
        $status3 = $this->conn->real_escape_string($_POST['ustatus3']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE zonas SET nom_zona = '$nom_zona', info_zona='$info_zona', img='$img', status3='$status3' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_zonas.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord3($postData)
		{   $this->conn = $this->connect();
		    $tamaño = $this->conn->real_escape_string($_POST['utamaño']);
        $status4 = $this->conn->real_escape_string($_POST['ustatus4']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE tamaños SET tamaño = '$tamaño', status4='$status4' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_tamaño.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord4($postData)
		{   $this->conn = $this->connect();
		    $subcategoria = $this->conn->real_escape_string($_POST['usubcategoria']);
        $status5 = $this->conn->real_escape_string($_POST['ustatus5']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE subcategoria SET subcategoria = '$subcategoria', status5='$status5' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_subcategoria.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord5($postData)
		{   $this->conn = $this->connect();
		    $nom_metodo = $this->conn->real_escape_string($_POST['unom_metodo']);
        $status6 = $this->conn->real_escape_string($_POST['ustatus6']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE metodo SET nom_metodo = '$nom_metodo', status6='$status6' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_metodopago.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord6($postData)
		{   $this->conn = $this->connect();
		    $moneda = $this->conn->real_escape_string($_POST['umoneda']);
        $status7 = $this->conn->real_escape_string($_POST['ustatus7']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE moneda SET moneda = '$moneda', status7='$status7' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_moneda.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord7($postData)
		{   $this->conn = $this->connect();
		    $categoria = $this->conn->real_escape_string($_POST['ucategoria']);
        $status8 = $this->conn->real_escape_string($_POST['ustatus8']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE categoria SET categoria = '$categoria', status8='$status8' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_categoria.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}

    public function updateRecord8($postData)
		{   $this->conn = $this->connect();
		    $impuesto = $this->conn->real_escape_string($_POST['uimpuesto']);
        $valor = $this->conn->real_escape_string($_POST['uvalor']);
        $status9 = $this->conn->real_escape_string($_POST['ustatus9']);
		    $id = $this->conn->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE impuesto SET impuesto = '$impuesto', valor='$valor', status9='$status9' WHERE id = '$id'";
			$sql = $this->conn->query($query);
			if ($sql==true) {
			    header("Location:index_impuesto.php?msg2=update");
			}else{
			    echo "Registro falló. Intenta otra vez";
			}
		    }
			
		}
     // usuarios

     public function agregarusuario($post)
     {
       $this->conn = $this->connect();
       $usuario = $this->conn->real_escape_string($_POST['usuario']);
       $clave = $this->conn->real_escape_string($_POST['clave']);
       $nombre = $this->conn->real_escape_string($_POST['nombre']);
       $apellido = $this->conn->real_escape_string($_POST['apellido']);
       $direccion = $this->conn->real_escape_string($_POST['direccion']);
       $telefono = $this->conn->real_escape_string($_POST['telefono']);
       $rol = $this->conn->real_escape_string($_POST['rol']);
       $status = $this->conn->real_escape_string($_POST['status1']);
       $query="INSERT INTO datos(usuario, clave, nombre, apellido, direccion, telefono, rol,status1) VALUES('$usuario','$clave','$nombre','$apellido', '$direccion', '$telefono', '$rol', '$status')";
       $sql = $this->conn->query($query);
       if ($sql==true) {
           header("Location:registrodeusuario_admi.php?msg1=insert");
       }else{
           echo "Registro falló. Intenta otra vez!";
       }
     }
 
     public function displayDat0()
     {
         $this->conn = $this->connect();
         $query = "SELECT * FROM datos";
         $result = $this->conn->query($query);
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
     public function displyaRecordByI($id)
     {   $this->conn = $this->connect();
         $query = "SELECT * FROM datos WHERE id = '$id'";
         $result = $this->conn->query($query);
     if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       return $row;
         }else{
       echo "Registro no encontrado";
         }
     }
     // Update customer data into customer table
     public function update($postData)
     {
       $this->conn = $this->connect();
       $usuario = $this->conn->real_escape_string($_POST['uusuario']);
       $clave = $this->conn->real_escape_string($_POST['uclave']);
       $nombre = $this->conn->real_escape_string($_POST['unombre']);
       $apellido = $this->conn->real_escape_string($_POST['uapellido']);
       $direccion = $this->conn->real_escape_string($_POST['udireccion']);
       $telefono = $this->conn->real_escape_string($_POST['utelefono']);
       $rol = $this->conn->real_escape_string($_POST['urol']);
       $status1 = $this->conn->real_escape_string($_POST['ustatus']);
         $id = $this->conn->real_escape_string($_POST['id']);
     if (!empty($id) && !empty($postData)) {
       $query = "UPDATE datos SET usuario = '$usuario', clave = '$clave', nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono', rol= '$rol', status1= '$status1' WHERE id = '$id'";
       $sql = $this->conn->query($query);
       if ($sql==true) {
           header("Location:registrodeusuario_admi.php?msg2=update");
       }else{
           echo "Registro falló. Intenta otra vez";
       }
         }
       
     }
     // Delete customer data from customer table
     public function delete($id)
     {   $this->conn = $this->connect();
         $query = "DELETE FROM datos WHERE id = '$id'";
         $sql = $this->conn->query($query);
     if ($sql==true) {
       header("Location:consulta_usuarios.php?msg3=delete");
     }else{
       echo "No se borra. Intenta otra vez";
         }
     }

     public function consulta_registros()
     {
         $this->conn = $this->connect();
         $query = "SELECT * FROM ordenes";
         $result = $this->conn->query($query);
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

     public function sum()
     {
      $this->conn = $this->connect();
      $query = "SELECT SUM(monto) AS sum FROM ordenes";
      $result = $this->conn->query($query);
      if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $output = "Monto total:"." ".$row['sum']."$";
 }
     }
     return $output;
    }

   public function filtro()
   {
      $this->conn = $this->connect();
       $fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
      $fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));
      $sqlTrabajadores = ("SELECT * FROM ordenes WHERE `fechatransferencia` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fechatransferencia ASC");
      $query = $this->conn->query($sqlTrabajadores);
          if ($query->num_rows > 0) 
          {
            $data = array();
            while ($row = $query->fetch_assoc())
             {
                $data[] = $row;
             }
              return $data;
          }else{
                  echo "No hay registros encontrados";
               }
      }

      public function filtrosum()
      {
         $this->conn = $this->connect();
          $fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
         $fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));
         $sqlTrabajadores = ("SELECT SUM(monto) as sum FROM ordenes WHERE `fechatransferencia` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fechatransferencia ASC");
         $query = $this->conn->query($sqlTrabajadores);
             if ($query->num_rows > 0) 
             {
               while ($row = $query->fetch_assoc())
                {
                  $output = "Monto total:"." ".$row['sum']."$";
                }
                 return $output;
             }else{
                     echo "No hay registros encontrados";
                  }
         }

      public function lectura_comida()
      {
          $this->conn = $this->connect();
          $query = "SELECT * FROM articulos";
          $result = $this->conn->query($query);
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

      public function lectura_moneda()
      {
          $this->conn = $this->connect();
          $query = "SELECT * FROM moneda";
          $result = $this->conn->query($query);
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

      public function lectura_metodopago()
      {
          $this->conn = $this->connect();
          $query = "SELECT * FROM metodo";
          $result = $this->conn->query($query);
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
      

      public function lectura_subcategoria()
      {
          $this->conn = $this->connect();
          $query = "SELECT * FROM subcategoria";
          $result = $this->conn->query($query);
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

      public function lectura_categoria()
      {
          $this->conn = $this->connect();
          $query = "SELECT * FROM categoria";
          $result = $this->conn->query($query);
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

      public function lectura_tamaño()
      {
          $this->conn = $this->connect();
          $query = "SELECT * FROM tamaños";
          $result = $this->conn->query($query);
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

      public function lectura_impuesto()
      {
          $this->conn = $this->connect();
          $query = "SELECT * FROM impuesto";
          $result = $this->conn->query($query);
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


      public function reporte()
     {
         $this->conn = $this->connect();
         $query = "SELECT * FROM articulos";
         $result = $this->conn->query($query);
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






} 
?>