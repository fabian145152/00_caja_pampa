<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPORTES x VIAJE</title>

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>

    <script>
        function deleteProduct(cod_titular) {
            bootbox.confirm("Desea Eliminar?" + cod_titular, function(result) {
                if (result) {
                    window.location = "delete_imp_viaje.php?q=" + cod_titular;
                }
            });
        }

        function updateProduct(cod_titular) {
            window.location = "edit_imp_viaje.php?q=" + cod_titular;
        }
    </script>
    <style>
        body {
            margin: 0px 250px;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">LISTA DE IMPORTES x VIAJE</h1>
    <?php
    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $sql_viajes = "SELECT * FROM importe_viajes WHERE 1";
    $result = $con->query($sql_viajes);

    ?>
    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <tr style="text-align: center">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>IMPORTE</th>
                <th>ACTUALIZAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>

            <tbody>
                <tr style="text-align: center">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['importe']; ?></td>
                    <td> <a class="btn btn-primary btn-sm" href="#" onclick="updateProduct(<?php echo $row['id']; ?>)">Actualizar</td>
                    <td> <a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $row['id']; ?>)">Eliminar</td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    <a href="nuevo_imp_viaje.php">NUEVO IMPORTe</a>
    <br>
    <a href="../index.php">SALIR</a>
</body>

</html>