<?php
 require '../admin/usere.php';
session_start();

if (isset($_GET['clear'])) {
    $stmt = $con->prepare('DELETE FROM carrito');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Todos los objetos han sido retirados';
    header('location:../index.php');
  }

session_unset();

session_destroy();

header('Location: ../index.php');

?>