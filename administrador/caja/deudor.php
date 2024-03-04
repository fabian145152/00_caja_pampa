<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <style>
        table {
            border: 1;
        }
    </style>
</head>

<body>


    <?php
    include_once '../../includes/db.php';
    include_once '../../includes/variables.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");


    $hoy = date("Y-m-d");
    $movil = $_POST['movil'];
    $para_mov = $_POST['quedan_para_el_movil'];
    $quedan_al_movil = $_POST['quedan_al_movil'];
    $para_base = $_POST['para_base'];
    $semana = $_POST['semana'];

    $ft = $_POST['ft'];


    echo "Movil: " . $movil;
    echo "<br>";
    echo "Semana: " . $semana;
    echo "<br>";
    echo "Fecha ultiomo deposito: " . $hoy; //date('Y-m-d');
    echo "<br>";
    echo "Quedan para el movil: " . $para_mov;
    echo "<br>";
    echo "Quedan al movil: " . $quedan_al_movil;
    echo "<br>";
    echo "Quedan para la base: "  . $para_base;
    echo "<br>";
    echo "Efectivo: " . $ft;
    echo "<br>";
    echo "Resto: " . $resto = $quedan_al_movil + $ft;
    echo "<br>";
    ?>
    <div>

        <table border="1">
            <tr>
                <th>id</th>
                <th>Fecha ultimo deposito</th>
                <th>Movil</th>
                <th>Semana</th>
                <th>Queda para el movil</th>
                <th>Queda para la base</th>
                <th>deuda movil</th>
                <th>pago en FT</th>
                <th>Pago en Voucher</th>
                <th>Saldo del movil</th>
            </tr>
    </div>

    <?php
    $sql = "SELECT id, 
                    fecha, 
                    movil, 
                    semana, 
                    queda_al_movil, 
                    queda_a_base, 
                    deuda_movil, 
                    pago_en_efect, 
                    pago_en_voucher, 
                    saldo_del_movil 
            FROM `caja` WHERE 1";
    $result = $con->query($sql);
    ?>
    <?php
    echo "<br>";
    while ($row = $result->fetch_assoc()) {
    ?>
        <div>


            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['movil'] ?></td>
                <td><?php echo $row['fecha'] ?></td>
                <td><?php echo $row['semana'] ?></td>
                <td><?php echo $row['queda_al_movil'] ?></td>
                <td><?php echo $row['queda_a_base']; ?></td>
                <td><?php echo $row['deuda_movil']; ?></td>
                <td><?php echo $row['pago_en_efect']; ?></td>
                <td><?php echo $row['pago_en_voucher']; ?></td>
                <td><?php echo $row['saldo_del_movil']; ?></td>

            </tr>

        </div>
        </table>
    <?php
    }
    ?>
</body>

</html>