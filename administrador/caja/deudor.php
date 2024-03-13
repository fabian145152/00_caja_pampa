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
    /*

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
            FROM caja WHERE movil = '$movil'";

            $result = $con->query($sql_2);
            while ($row = $result->fetch_assoc()) {

            ?>
                <tr>
                    <td><?php echo $nu_id = $row['id']; ?></td>
                    <td><?php echo $nu_fecha_dep = $row['fecha_dep'] ?></td>
                    <td><?php echo $nu_fecha_actual = $row['fecha_actual'] ?></td>
                    <td><?php echo $nu_movil = $row['movil'] ?></td>
                    <td><?php echo $nu_semana = $row['semana'] ?></td>
                    <td><?php echo $nu_semana_actual = $row['semana_actual'] ?></td>
                    <td><?php echo $nu_debe_de_semanas = $row['debe_de_semanas'] ?></td>
                    <td><?php echo $nu_queda_al_movil = $row['queda_al_movil'] ?></td>
                    <td><?php echo $nu_queda_a_base = $row['queda_a_base']; ?></td>
                    <td><?php echo $nu_deuda_movil = $row['deuda_movil']; ?></td>
                    <td><?php echo $nu_pago_en_efect = $row['pago_en_efect']; ?></td>
                    <td><?php echo $nu_pago_en_papel = $row['pago_en_voucher']; ?></td>
                    <td><?php echo $nu_saldo_del_movil = $row['saldo_del_movil']; ?></td>
                </tr>
            <?php
            }

            ?>
        </table>

        <?php
        echo $nu_id;
        echo "<br>";
        echo $nu_fecha_dep;
        echo "<br>";
        echo $nu_fecha_actual;
        echo "<br>";
        echo $nu_movil;                     //movil
        echo "<br>";
        echo $nu_semana;                    //semana del voucher
        echo "<br>";
        echo $nu_semana_actual;             //semana actual
        echo "<br>";
        echo $nu_debe_de_semanas;           //deuda acumulada de semanas
        echo "<br>";
        echo $nu_queda_al_movil;            //plata que le queda en FT al movil
        echo "<br>";
        echo $nu_queda_a_base;              //porcentaje que le queda a la base
        echo "<br>";
        echo $nu_deuda_movil;               //lo que se le debe depositar al movil  
        echo "<br>";
        echo $nu_pago_en_efect;             //plata que trajo en el caso de que la hubiera
        echo "<br>";
        echo $nu_pago_en_papel;             //suma de todo lo que pago con voucher
        echo "<br>";
        echo $nu_saldo_del_movil;           //plata que le resta al movil
        echo "<br>";
        if ($nu_deuda_movil > $nu_debe_de_semanas) {
            echo "Puede pagar semanas adeudadas";
            echo "<br>";
            echo $semanas_que_puede_pagar = $nu_semana_actual - $nu_semana;
            echo "<br>";
            echo "Se le descuentan: " . $semana_que_puede = $semanas_que_puede_pagar * $abono_semanal . " de semanas adeudadas";
            echo "<br>";
            echo "Le Quedan:" . $le_quedan = $nu_deuda_movil - $semana_que_puede;
        } else {
            echo "No le alcanza:";
        }
        ?>
    </div>
    <?php
/*
    $leer_para_des = "SELECT * FROM caja WHERE $movil";
    $es_igual = $con->query($leer_para_des);
    while ($prim = $es_igual->fetch_assoc()) {
    ?>
        <div>
            <tr>
                <td><?php echo "Movil: " . $prim['movil'] ?></td>
                <br>
                <td><?php echo "Debe de semanas: " . $debe_de_s = $prim['debe_de_semanas'] ?></td>
                <br>
                <td><?php echo "Quedan al movil" . $queda_sin_semanas = $prim['queda_al_movil'] ?></td>
                <td>
                    <?php echo "Semana menos voucher: " . $semana_menos_voucher = $queda_sin_semanas - $debe_de_s;
                    $actualiza_saldo = "";
                    ?>
                </td>
            </tr>
        </div>
    <?php
    }



    $sql_3 = "UPDATE caja SET deuda_movil = '$semana_menos_voucher' +1 WHERE movil = '$movil'";

    if (mysqli_query($conn, $sql_3)) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
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
    </div>
</body>

</html>