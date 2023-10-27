<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOUCHER</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <script>
        function deleteProduct(cod_voucher) {
            bootbox.confirm("Desea Guardar?" + cod_voucher, function(result) {
                if (result) {
                    window.location = "buscador_voucher.php?q=" + cod_voucher;
                }

            });
        }

        function detalleProduct(cod_voucher) {
            window.location = "detalle_voucher.php?q=" + cod_voucher;
        }

        /* ahora viene la funcion update*/
        function updateProduct(cod_voucher) {
            window.location = "edit_voucher.php?q=" + cod_voucher;
        }
    </script>
</head>

<body>
    <h1>buscador</h1>
    <a href="inicio_voucher.php">Volver</a>
    <?php

    //echo $fecha = $_POST['fecha'];
    echo $mov = $_POST['movil'];
    //echo $viaje = $_POST['viaje'];

    $movil = "A" . $mov;
    //echo "<br>";
    //echo $movil;
    ?>



    <?php

    include_once '../../includes/db.php';

    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    //if ($movil <> '0') {

    $sql = "SELECT * FROM voucher_nuevos WHERE movil = '$movil' ORDER BY movil";
    $datos = $con->query($sql);
    //}
    /*
    if ($viaje <> '0') {
        $sql = "SELECT * FROM voucher_nuevos WHERE viaje_no = '$viaje' ";
        $datos = $con->query($sql);
    }
*/
    ?>

    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">

            <th>id</th>
            <th>V No.</th>
            <th>Competado</th>
            <th>Nom Pasajero</th>
            <th>Movil</th>
            <th>CC</th>
            <th>Reloj</th>
            <th>Peaje</th>
            <th>Equipaje</th>
            <th>Adicional</th>
            <th>Plus</th>
            <th>Total</th>
            <!--
            <th>Detalles</th>

            <th>Guardar</th>
    -->

        </thead>

        <?php



        while ($d = $datos->fetch_assoc()) {

        ?>
            <tr>
                <td><?php echo $d['id']; ?></td>
                <td><?php echo $d['viaje_no']; ?></td>
                <td><?php $comp = $d['completado'];
                    echo $fecha_echo = substr($comp, 0, -8);
                    ?></td>
                <td><?php echo $d['nom_pasaj']; ?></td>
                <td><?php echo $d['movil']; ?></td>
                <td><?php echo $d['cc']; ?></td>
                <td><?php echo $d['reloj']; ?></td>
                <td><?php echo $d['peaje']; ?></td>
                <td><?php echo $d['equipaje']; ?></td>
                <td><?php echo $d['adicional']; ?></td>
                <td><?php echo $d['plus']; ?></td>
                <td><?php echo $d['total'] ?></td>

                <!--
                <td> <a class="btn btn-primary btn-sm" href="#" onclick="detalleProduct(<?php //echo $d['id']; 
                                                                                        ?>)">Detalles</td>

                <td> <a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php //echo $d['id']; 
                                                                                        ?>)">Validar</td>
            -->
            </tr>

        <?php
        }
        ?>
    </table>





</body>

</html>