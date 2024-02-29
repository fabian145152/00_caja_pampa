<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>

</head>

<body>


    <?php
    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");


    $hoy = date("Y-m-d");
    $movil = $_POST['movil'];
    $suma = $_POST['total_de_voucher'];
    $abono = $_POST['abono'];
    $cant_viajes = $_POST['total_registros'];
    $x_viaje = $_POST['total_de_viajes'];
    $semana = $_POST['semana'];
    $ft = $_POST['ft'];


    echo "Movil: " . $movil;
    echo "<br>";
    echo "Semana: " . $semana;
    echo "<br>";
    echo "Fecha ultiomo deposito: " . $hoy; //date('Y-m-d');
    echo "<br>";
    echo "total en voucher: " . $suma;

    $diez = $suma * 0.1;
    $a_cobrar_viajes = $cant_viajes * $x_viaje;

    echo "<br>";
    echo "Total para el movil: " . $tot_mov = $suma - $abono - $a_cobrar_viajes - $diez;
    echo "<br>";
    echo "Suma para base: "  . $tot_base = $suma - $tot_mov;;
    echo "<br>";
    echo "Efectivo: " . $ft;
    echo "<br>";
    echo "A favor del movil: " . $total = $tot_mov + $ft;
    echo "<br>";
    ?>
    <div>

        <thead>
            <tr>
                <th>id</th>
                <th>Movil</th>
                <th>Fecha</th>
                <th>Semana</th>
                <th>Total_voucher</th>
            </tr>
        </thead>
    </div>

    <?php
    $sql = "SELECT `id`, `movil`, `fecha`, `semana`, `tot_voucher`, `tot_movil`, `para_base`, `evo` FROM `caja_voucher` WHERE 1";
    $result = $con->query($sql);
    ?>
    <?php
    echo "<br>";
    while ($row = $result->fetch_assoc()) {
    ?>
        <div>

            <tbody>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['semana'] ?></td>
                    <td><?php echo $row['tot_voucher'] ?></td>
                </tr>
            </tbody>
        </div>
    <?php
    }
    ?>
</body>

</html>