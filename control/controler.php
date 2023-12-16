<?php  

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    $alerta = "<script>alert('Usuario o contraseña vacío');</script>";
    echo $alerta;
  }
  else{
    $Model = new User();
    $user = $Model->getUser($username, $password);
    if($user == false){
      $alerta1 = "<script>alert('El usuario no existe');</script>";
      echo $alerta1;
    }
    
    session_start();
    $_SESSION['user'] = $user;
    if(isset($_SESSION['user'])){
        switch($user['rol'])
        {
          case 1:
            header('Location: ../php/carrito_2admin.php');
            break;
            case 2:
              header('Location: ../php/carrito_2.php');

              break;
        


        }
      }

  
    }
  }
  
?>