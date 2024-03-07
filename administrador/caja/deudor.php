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

    <h3>Aca guarda los datos en la tabla caja</h3>
    

    <?php
    include_once '../../includes/db.php';
    include_once '../../includes/variables.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    //$fecha = date("Y-m-d");
    $fecha = $_POST['fecha'];
    $movil = $_POST['movil'];
    $semana = $_POST['semana'];
    $abono_semanal = $_POST['abono_semanal'];
    $para_mov = $_POST['quedan_para_el_movil'];
    $para_base = $_POST['para_base'];
    $deuda_mov = 0;
    $ft = $_POST['ft'];
    $pago_en_voucher = $_POST['pago_en_voucher'];
    $saldo_del_movil = 10;
    $quedan_al_movil = $_POST['quedan_al_movil'];


    echo "Fecha ultimo deposito: " . $fecha;
    echo "<br>";
    echo "Fecha de hoy: " . $fecha_de_hoy = date("Y-m-d");
    echo "<br>";
    echo "Movil: " . $movil;
    echo "<br>";
    echo "Semana de deposito: " . $semana;
    echo "<br>";
    echo "Semana Actual: " . $semana_actual = date('W');
    echo "<br>";
    echo "debe: " . $cant_semanas = $semana_actual - $semana . " Semanas";
    echo "<br>";
    echo "Abono semanal: " . $abono_semanal;
    echo "<br>";
    echo "Debe de samanas: " . $debe_semanas = $cant_semanas * $abono_semanal;
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
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


    $servername = "localhost";
    $username = "root";
    $password = "belgrado";
    $dbname = "acaja";

    // Crear una conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    //exit();
    /*

    $sql = "INSERT INTO caja (
                              fecha_dep,
                              fecha_actual, 
                              movil, 
                              semana,
                              semana_actual, 
                              queda_al_movil, 
                              queda_a_base, 
                              deuda_movil, 
                              pago_en_efect, 
                              pago_en_voucher, 
                              saldo_del_movil
                              ) 
                              VALUES ('$fecha',
                                      '$fecha_de_hoy',
                                      '$movil', 
                                      '$semana', 
                                      '$semana_actual',
                                      '$quedan_al_movil', 
                                      '$para_base', 
                                      '$deuda_mov', 
                                      '$ft', 
                                      '$pago_en_voucher', 
                                      '$saldo_del_movil')";



    if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }

*/

    ?>
    <div>
        <table border="2">
            <tr>
                <th>id</th>
                <th>Fecha ultimo dep</th>
                <th>Fecha actual</th>
                <th>Movil</th>
                <th>Semana dep</th>
                <th>Semana Actual</th>
                <th>Queda para el movil</th>
                <th>Queda para la base</th>
                <th>deuda movil</th>
                <th>pago en FT</th>
                <th>Pago en Voucher</th>
                <th>Saldo del movil</th>
            </tr>

            <?php

            $sql_2 = "SELECT id, 
                    fecha_dep, 
                    fecha_actual,
                    movil, 
                    semana, 
                    semana_actual,
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
                    <td><?php echo $row['fecha_dep'] ?></td>
                    <td><?php echo $row['fecha_actual'] ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <td><?php echo $row['semana'] ?></td>
                    <td><?php echo $row['semana_actual'] ?></td>
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