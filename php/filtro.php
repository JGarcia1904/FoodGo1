<?php
sleep(1);
require('../admin/User.php');
/**
 * Nota: Es recomendable guardar la fecha en formato año - mes y dia (2022-08-25)
 * No es tan importante que el tipo de fecha sea date, puede ser varchar
 * La funcion strtotime:sirve para cambiar el forma a una fecha,
 * esta espera que se proporcione una cadena que contenga un formato de fecha en Inglés US,
 * es decir año-mes-dia e intentará convertir ese formato a una fecha Unix dia - mes - año.
*/


?>

<table class="table table-hover">
    <thead>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cedula</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Monto</th>
            <th scope="col">Fecha</th>
            <th scope="col">Banco</th>
        </tr>
    </thead>
        <tbody>
        <?php
           $a = new User();
           echo $a->filtrosum();
           
           
        $i = 1; 
          $fechas = $a->filtro();
          foreach ($fechas as $fecha){
        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $fecha['nombre']; ?></td>
                <td><?php echo $fecha['cedula']; ?></td>
                <td><?php echo $fecha['direccion']; ?></td>
                <td><?php echo $fecha['telefono']; ?></td>
                <td><?php echo '$ ' . $fecha['monto']; ?></td>
                <td><?php echo $fecha['fechatransferencia']; ?></td>
                <td><?php echo $fecha['banco']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    
</table>
