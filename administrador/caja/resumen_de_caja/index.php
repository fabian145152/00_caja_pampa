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
    <style>
        body {
            margin: 50px 150px;
        }
    </style>
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
                <th>Total dep a moviles</th>
                <th>Voucher en caja</th>
                <th>Total en caja de voucher</th>

            </tr>
        </thead>

        <?php
        $deposito_mov = 0;
        $deposito_vou = 0;
        $consulta = "SELECT * FROM caja WHERE 1";
        $result = $con->query($consulta);
        while ($lista = $result->fetch_assoc()) {
        ?>
            <div>
                <tr>
                    <td><?php echo $lista['movil'] ?></td>
                    <td><?php echo $lista['fecha_actual'] ?></td>
                    <td><?php echo $dep = $lista['dep_al_movil']; ?></td>
                    <th><?php echo $deposito_mov += $dep ?></th>
                    <td><?php echo $vou = $lista['queda_voucher_en_caja'] ?></td>
                    <th><?php echo $deposito_vou += $vou ?></th>
                </tr>
            </div>
            <div>
                <tr>

                </tr>

            </div>


        <?php
        }
        ?>
        <div>
            <ul>
                <li><strong>Total de efectivo en caja: <?php echo "$" . $deposito_mov . "-" ?></strong></li>
                <li><strong> en voucher: <?php echo "$" . $deposito_vou . "-" ?></strong></li>
            </ul>
        </div>
        <a href="../index.php">Salir</a>
</body>

</html>