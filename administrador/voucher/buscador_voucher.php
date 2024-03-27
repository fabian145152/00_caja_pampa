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
        function validateProduct(cod_voucher) {
            bootbox.confirm("Desea Guardar?" + cod_voucher, function(result) {
                if (result) {
                    window.location = "valida_voucher.php?q=" + cod_voucher;
                }
            });
        }

<<<<<<< HEAD
        function detalleProduct(cod_voucher) {
            window.location = "detalle_voucher.php?id=" + cod_voucher;
=======
        function updateProduct(cod_voucher) {
            window.location = "det_desde_busc.php?q=" + cod_voucher;
>>>>>>> f3d8aebd37685a916380e577ed61cf9ec0fa328e
        }

        function deleteProduct(cod_voucher) {
            window.location = "delete_voucher.php?q=" + cod_voucher;

        }
    </script>
</head>

<body>
    <style>
        .titule {
            text-align: center;
        }
    </style>
    <h2 class="titule">VOUCHER DE LA UNIDAD <?php echo $mov = $_POST['movil']; ?> </h2>
    <a href="inicio_voucher.php">Volver</a>
    <?php

    //echo $fecha = $_POST['fecha'];
    
    $mov = $_POST['movil'];
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

    $sql = "SELECT * FROM voucher_nuevos WHERE movil = '$movil' ";
    $regis = $con->query($sql);
    //}
    /*
    if ($viaje <> '0') {
        $sql = "SELECT * FROM voucher_nuevos WHERE viaje_no = '$viaje' ";
        $datos = $con->query($sql);
    }
*/
    $registros = $regis->num_rows;

    ?>

    <!-- <table class="table table-bordered table-sm table-hover" accept="charset utf8" action="save_voucher.php" <?php //echo $d['id'] 
                                                                                                                    ?> method="post"> -->
    <table class="table table table-bordered table-sm table-hover" action="save_voucher.php?=<?php echo $d['id'] ?>" method="post">

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
<<<<<<< HEAD
            <th>Detalles</th>
            <th>Validar</th>
            <th>Borrar</th>
            <!--
            <th>Detalles</th>

            <th>Guardar</th>
    -->
=======
            <th></th>
            <th></th>
            <th></th>
>>>>>>> f3d8aebd37685a916380e577ed61cf9ec0fa328e

            <br>
        </thead>

        <?php



        while ($d = $regis->fetch_assoc()) {

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
                <td><a class="btn btn-primary btn-sm" href="#" onclick="detalleProduct(<?php echo $d['id']; ?>)">Detalles</td>
                <td><a class="btn btn-warning btn-sm" href="#" onclick="updateProduct(<?php echo $d['id']; ?>)">Validar</td>
                <td><a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $d['id'] ?>)">Borrar</a></td>



                <?php

                for ($i = $registros; $i >= 0; $i--) {
                    echo "Regisrtros: " . $i;
                    $id = $d['id'];
                    $movil = $d['movil'];
                    $fecha = $d['completado'];
                    $viaje_no = $d['viaje_no'];
                    $cc = $d['cc'];
                    $reloj = $d['reloj'];
                    $peaje = $d['peaje'];
                    $equipaje = $d['equipaje'];
                    $adicional = $d['adicional'];
                    $plus = $d['plus'];

                    //exit();
                    $guarda = "INSERT INTO voucher_temporales 
                                        VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $stmt = $con->prepare($guarda);
                    $stmt->bind_param("issddddddd", $id, $movil, $fecha, $viaje_no, $cc, $reloj, $peaje, $equipaje, $adicional, $plus);
                    $stmt->execute();
                ?>
                <?php
                }
                ?>

                <td> <a class="btn btn-primary btn-sm" href="#" onclick="updateProduct(<?php echo $d['id']; ?>)">Actualizar</td>
                <td><a class="btn btn-warning btn-sm" href="#" onclick="validateProduct(<?php echo $d['id']; ?>)">Validar</a></td>
                <td> <a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $d['id']; ?>)">Eliminar</td>
            </tr>
    </table>
<?php




            $borra_nuevos = "DELETE FROM voucher_nuevos WHERE  movil = '$movil' ";
            $result = $con->query($borra_nuevos);


            if ($i = 0) {
                header("buscador_voucher.php");
            }
        }



?>


</body>

</html>