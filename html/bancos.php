<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bancos</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="../assets/css/img.css" rel="stylesheet">
        <link href="../assets/css/estilo.css" rel="stylesheet">
        <link rel="shortcut icon" href="../img\900.jpg" type="image/x-icon">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
        <nav>
            <ul class="enlaces-menu">
                <li>
                    <a href="../index.php">Atrás</a>
                </li>
            </ul>
        </nav>

    
        <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include '../admin/usere.php';
  			$stmt = $con->prepare('SELECT * FROM bancos WHERE status2 = 1');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="card">
        <div class="card-deck">
          <div class="card">
            <img src="../img/<?= $row['img'] ?>" class="card-img-top" height="250">
              <h4 class="card-title text-center text-info"><?= $row['nom_banco'] ?></h4>
              <p>Número de cuenta: <?= $row['num_cuenta'] ?></p>
              <p>RIF: <?= $row['rif'] ?></p>
              <p>Tipo de cuenta: <?= $row['tipo'] ?></p>
              <p>Teléfono: <?= $row['tlf'] ?></p>

            <div class="card-footer p-1">
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="ptitulo" value="<?= $row['nom_banco'] ?>">
                <input type="hidden" class="pprecio" value="<?= $row['num_cuenta'] ?>">
                <input type="hidden" class="pimg" value="<?= $row['img'] ?>">
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
        
</body>
</html>