<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESUMEN DE CAJA</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>

</head>

<body>
    <h2>Resumen de caja</h2>
    <?php
    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");
    ?>

    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Movil</th>
                <th>Fecha ultimo movimiento</th>
                <th>Depositarle al movil</th>
                <th>Voucher en caja</th>

            </tr>
        </thead>

        <?php
        $consulta = "SELECT * FROM caja WHERE 1";
        $result = $con->query($consulta);
        while ($lista = $result->fetch_assoc()) {
        ?>
            <div>
                <tr>
                    <td><?php echo $lista['movil'] ?></td>
                    <td><?php echo $lista['fecha_actual'] ?></td>
                    <td><?php echo $lista['dep_al_movil'] ?></td>
                    <td><?php echo $lista['queda_voucher_en_caja'] ?></td>
                    <td></td>
                </tr>
            </div>
        <?php
        }
        ?>
        <a href="../index.php">Salir</a>
</body>

</html>