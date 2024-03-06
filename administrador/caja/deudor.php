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

    <h1>Aca guarda los datos en la tabla caja</h1>

    <?php
    include_once '../../includes/variables.php';
    include_once '../../includes/db.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $hoy = date("Y-m-d");
    $movil = $_POST['movil'];
    $semana = $_POST['semana'];
    $para_mov = $_POST['quedan_para_el_movil'];
    $para_base = $_POST['para_base'];
    $deuda_mov = 0;
    $ft = $_POST['ft'];
    $pago_en_voucher = $_POST['pago_en_voucher'];
    $saldo_del_movil = 0;
    $quedan_al_movil = $_POST['quedan_al_movil'];


    echo "Fecha ultiomo deposito: " . $hoy;
    echo "<br>";
    echo "Movil: " . $movil;
    echo "<br>";
    echo "Semana: " . $semana;
    echo "<br>";
    echo "Quedan para el movil: " . $para_mov;
    echo "<br>";
    echo "Quedan para la base: "  . $para_base;
    echo "<br>";
    echo "Quedan al movil: " . $quedan_al_movil;
    echo "<br>";
    echo "Efectivo: " . $ft;
    echo "<br>";
    echo "Pago en voucher: " . $pago_en_voucher;
    echo "<br>";
    echo "Resto: " . $deuda_mov = $quedan_al_movil + $ft;
    echo "<br>";

    $sql = "INSERT INTO caja (fecha, 
                              movil, 
                              semana, 
                              queda_al_movil, 
                              queda_a_base, 
                              deuda_movil, 
                              pago_en_efect, 
                              pago_en_voucher, 
                              saldo_del_movil)
            VALUES (?,?,?,?,?,?,?,?,?)";

    $stmt = $con->prepare($sql);

    $stmt->bind_param("siiiiiiii", 
        $hoy, 
        $movil,
        $semana,
        $para_mov,
        $para_base,
        $deuda_movil,
        $ft,
        $pago_en_voucher,
        $saldo_del_movil
    );


    if ($stmt->execute()) {
    ?>
        <script>
            alert("Registro Guardado")
        </script>
    <?php
    } elseif (!$stmt->execute()) {
        echo "Error";
    }
    exit();

    ?>

    <div>
        <table border="2">
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

            <?php
            $sql_2 = "SELECT id, 
                    fecha, 
                    movil, 
                    semana, 
                    queda_al_movil, 
                    queda_a_base, 
                    deuda_movil, 
                    pago_en_efect, 
                    pago_en_voucher, 
                    saldo_del_movil 
            FROM caja WHERE 1";

            $result = $con->query($sql_2);
            while ($row = $result->fetch_assoc()) {

            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <td><?php echo $row['semana'] ?></td>
                    <td><?php echo $row['queda_al_movil'] ?></td>
                    <td><?php echo $row['queda_a_base']; ?></td>
                    <td><?php echo $row['deuda_movil']; ?></td>
                    <td><?php echo $row['pago_en_efect']; ?></td>
                    <td><?php echo $row['pago_en_voucher']; ?></td>
                    <td><?php echo $row['saldo_del_movil']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
</body>

</html>