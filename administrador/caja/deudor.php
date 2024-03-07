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

        #columnas {
            column-count: 5;
            column-gap: 20px;
            column-rule: 4px dotted gray;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr auto;
            grid-gap: 10px;
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
    $fecha = $_POST['fecha_actual'];
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
    echo "Semana Actual: " . $semana_ac = date('W');
    $semana_actual = $semana_ac - 1;
    echo "<br>";
    echo "debe: " . $cant_semanas = $semana_actual - $semana . " Semanas";
    echo "<br>";
    echo "Abono semanal: " . $abono_semanal;
    echo "<br>";
    echo "Debe cant de semanas: " . $debe_semanas = $cant_semanas * $abono_semanal;

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


    $sql = "INSERT INTO caja (
                              fecha_dep,
                              fecha_actual, 
                              movil, 
                              semana,
                              semana_actual,
                              debe_de_semanas, 
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
                                      '$debe_semanas',
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
                <th>Debe de semanas</th>
                <th>Queda para el movil</th>
                <th>10% p/base</th>
                <th>Dep al movil</th>
                <th>pago en FT</th>
                <th>Pago en Voucher</th>
                <th>Saldo mov FT</th>
            </tr>

            <?php

            $sql_2 = "SELECT id, 
                    fecha_dep, 
                    fecha_actual,
                    movil, 
                    semana, 
                    semana_actual,
                    debe_de_semanas,
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
                    <td><?php echo $row['debe_de_semanas'] ?></td>
                    <td><?php echo $row['queda_al_movil'] ?></td>
                    <td><?php echo $row['queda_a_base']; ?></td>
                    <td><?php echo $row['deuda_movil']; ?></td>
                    <td><?php echo $row['pago_en_efect']; ?></td>
                    <td><?php echo $pago_en_papel = $row['pago_en_voucher']; ?></td>
                    <td><?php echo $row['saldo_del_movil']; ?></td>
                </tr>
            <?php
            }

            ?>
        </table>

        <?php
        $leer_para_des = "SELECT * FROM caja WHERE $movil";
        $es_igual = $con->query($leer_para_des);
        while ($prim = $es_igual->fetch_assoc()) {
        ?>
            <div>
                <tr>
                    <td><?php echo $prim['movil'] ?></td>
                    <td><?php echo $debe_de_s = $prim['debe_de_semanas'] ?></td>
                    <td><?php echo $queda_sin_semanas = $prim['queda_al_movil'] ?></td>
                    <td>
                        <?php echo $semana_menos_voucher = $queda_sin_semanas - $debe_de_s;
                        $actualiza_saldo = "";
                        ?>
                    </td>
                </tr>
            </div>
        <?php
        }

        ?>
        <div class="grid">
            <div>
                <ul>
                    <li>Saldo en voucher: <?php
                                            // echo "$" . $pago_en_papel;
                                            ?></li>
                    <li>Saldo en Efectivo: </li>
                    <li>Debe de semanas: <?php //echo $debe_semanas 
                                            ?> </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li></li>
                    <li></li>
                </ul>
            </div>
</body>

</html>