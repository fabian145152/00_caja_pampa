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
        function updateProduct(cod_voucher) {
            bootbox.confirm("Desea Guardar?" + cod_voucher, function(result) {
                if (result) {
                    window.location = "valida_voucher.php?q=" + cod_voucher;
                }
            });
        }

        function detalleProduct(cod_voucher) {
            window.location = "detalle_voucher.php?q=" + cod_voucher;
        }
        /* ahora viene la funcion update*/
        function deleteProduct(cod_voucher) {
            window.location = "delete_voucher.php?q=" + cod_voucher;
        }
    </script>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootbox.min.js"></script>
    </head>

<body>
    <?php

    include_once '../../includes/db.php';

    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $mo = $_POST['movil'];
    echo "<h2><strong>VOUCHER DEL MOVIL: " . $movil = "A" . $mo . "</strong></h2>";




    if (empty($mo)) {
        $sql_1 = "SELECT * FROM voucher_temporales WHERE =1  ";
        $regis = $con->query($sql_1);
        echo "Estaba vacio: " . $mo = $datos['movil'];
    }
    //exit();

    $sql = "SELECT * FROM voucher_nuevos WHERE movil = '$movil' ";
    $regis = $con->query($sql);




    echo "<br>";
    //echo $reg = $datos->num_rows;
    //echo $registros = $reg - 1;
    echo "<br>";
    echo $movil;

    ?>
    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Movil</th>
            <th>Fecha</th>
            <th>Viaje No</th>
            <th>CC</th>
            <th>reloj</th>
            <th>Peaje</th>
            <th>equipaje</th>
            <th>adicional</th>
            <th>plus</th>
            <th>Detalles</th>
            <th>Validar</th>
            <th>Borrar</th>
        </thead>
        <?php
        while ($d = $regis->fetch_assoc()) {
            echo $movil;
        ?>
            <tr>
                <td><?php echo $d['id']; ?></td>
                <td><?php echo $d['movil'] ?> </td>
                <td><?php echo $d['completado'] ?> </td>
                <td><?php echo $d['viaje_no'] ?></td>
                <td><?php echo $d['cc']; ?></td>
                <td><?php echo $d['reloj']; ?></td>
                <td><?php echo $d['peaje']; ?></td>
                <td><?php echo $d['equipaje']; ?></td>
                <td><?php echo $d['adicional']; ?></td>
                <td><?php echo $d['plus']; ?></td>

                <td><a class="btn btn-primary btn-sm" href="#" onclick="detalleProduct(<?php echo $d['id']; ?>)">Detalles</td>
                <td><a class="btn btn-warning btn-sm" href="#" onclick="updateProduct(<?php echo $d['id']; ?>)">Validar</td>
                <td><a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $d['id'] ?>)">Borrar</a></td>


            </tr>

        <?php


            for ($i = $registros; $i >= 0; $i--) {
                echo $i;
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
                $guarda = "INSERT INTO voucher_temporales VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt = $con->prepare($guarda);
                $stmt->bind_param("sssiiiiiii", $id, $movil, $fecha, $viaje_no, $cc, $reloj, $peaje, $equipaje, $adicional, $plus);
                $stmt->execute();

                $borra_nuevos = "DELETE FROM voucher_nuevos WHERE  movil = '$movil' ";
                $result = $con->query($borra_nuevos);


                if ($i = 0) {
                    //header("buscador_voucher.php");
                }
            }
        }


        ?>
    </table>

</body>

</html>