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

    $movil = $_POST['movil'];
    $fecha_voucher = $_POST['fecha_voucher'];
    $abono_semanal = $_POST['abono_semanal'];
    $paga_de_viajes = $_POST['paga_de_viajes'];
    $pago_en_voucher = $_POST['pago_en_voucher'];
    $para_mov = $_POST['quedan_para_el_movil'];
    $total_registros =
        $para_base = $_POST['para_base'];
    $semana = $_POST['semana'];
    $deuda_mov = 0;
    $ft = $_POST['ft'];
    $saldo_del_movil = 10;
    $quedan_al_movil = $_POST['quedan_al_movil'];
    $MP = $_POST['MP'];
    $extraccion = $_POST['extraccion'];
    $deposito = $_POST['deposito'];
    $Dep_al_movil = $_POST['dep_al_movil'];


    echo "Fecha ultimo deposito: " . $fecha_voucher;
    echo "<br>";
    echo "Fecha de hoy: " . $fecha_de_hoy = date("Y-m-d");
    echo "<br>";
    echo "Movil: " . $movil;
    echo "<br>";
    echo "Ultima semana que deposito: " . $semana;
    echo "<br>";
    echo "Semana Actual: " . $semana_ac = date('W');
    $semana_actual = $semana_ac;
    echo "<br>";
    echo "debe: " . $cant_semanas = $semana_actual - $semana  . " Semanas";
    echo "<br>";
    echo "Paga de viajes: " . $paga_de_viajes;
    echo "<br>";
    echo "Pago en Voucher: " . $pago_en_voucher;
    echo "<br>";
    echo "10% para base = " . $diez = $pago_en_voucher * .1;
    echo "<br>";
    echo "90% para el movil = " . $noventa = $pago_en_voucher * .9;
    echo "<br>";
    echo "Deposito en efectivo: " . $ft;
    echo "<br>";
    echo "Deposito MP: " . $MP;
    echo "<br>";
    echo "Debe cant de semanas: " . $debe_semanas = $cant_semanas * $abono_semanal;
    echo "<br>";
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
                              fecha_ult_dep,
                              fecha_actual, 
                              movil, 
                              semana_ult_dep,
                              semana_actual,
                              debe_cant_de_semanas, 
                              paga_de_viajes, 
                              trajo_en_voucher, 
                              deuda_movil, 
                              diez,
                              noventa, 
                              dep_en_ft, 
                              dep_MP,
                              extraccion,
                              deposito,
                              dep_al_movil,
                              quedo_ft_en_caja,
                              queda_voucher_en_caja
                              ) 
                              VALUES ('$fecha_voucher',
                                      '$fecha_de_hoy',
                                      '$movil', 
                                      '$semana', 
                                      '$semana_ac',
                                      '$cant_semanas',
                                      '$paga_de_viajes', 
                                      '$pago_en_voucher', 
                                      '$diez', 
                                      '$noventa', 
                                      '$ft', 
                                      '$MP',
                                      '$extraccion'.
                                      '$deposito',
                                      '$Dep_al_movil')";



    if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }



    ?>
    <div>
        <table border="2">
            <tr>

                <th>Fecha ultimo dep</th>
                <th>Fecha actual</th>
                <th>Movil</th>
                <th>Semana ultimo dep</th>
                <th>Semana Actual</th>
                <th>Debe cant de semanas</th>
                <th>paga de viajes</th>
                <th>Trajo en Voucher</th>
                <th>deuda movil</th>
                <th>10%</th>
                <th>90%</th>
                <th>dep en FT</th>
                <th>dep MP</th>
                <th>Extracción</th>
                <th>Deposito</th>
                <th>dep al movil</th>
                <th>queda FT en caja</th>
                <th>queda vouch en caja</th>
            </tr>

            <?php

            $sql_2 = "SELECT id,
                             fecha_ult_dep,
                             fecha_actual,
                             movil,
                             semana_ult_dep,
                             semana_actual,
                             debe_cant_de_semanas,
                             paga_de_viajes,
                             trajo_en_voucher,
                             deuda_movil,
                             diez,
                             noventa,
                             dep_en_ft,
                             dep_MP,
                             extraccion,
                             deposito,
                             dep_al_movil,
                             queda_ft_en_caja,
                             queda_voucher_en_caja
            FROM caja WHERE movil = '$movil'";

            $result = $con->query($sql_2);
            while ($row = $result->fetch_assoc()) {

            ?>
                <tr>
                    <?php $nu_id = $row['id']; ?>
                    <td><?php echo $nu_fecha_dep = $row['fecha_ult_dep'] ?></td>
                    <td><?php echo $nu_fecha_actual = $row['fecha_actual'] ?></td>
                    <td><?php echo $nu_movil = $row['movil'] ?></td>
                    <td><?php echo $nu_semana_ult_dep = $row['semana_ult_dep'] ?></td>
                    <td><?php echo $nu_semana_actual = $row['semana_actual'] ?></td>
                    <td><?php echo $nu_debe_cant_de_semanas = $row['debe_cant_de_semanas'] ?></td>
                    <td><?php echo $nu_paga_de_viajes = $row['paga_de_viajes'] ?></td>
                    <td><?php echo $nu_trajo_en_voucher = $row['trajo_en_voucher']; ?></td>
                    <td><?php echo $nu_deuda_movil = $row['deuda_movil']; ?></td>
                    <td><?php echo $nu_diez = $row['diez']; ?></td>
                    <td><?php echo $nu_noventa = $row['noventa']; ?></td>
                    <td><?php echo $nu_dep_en_ft = $row['dep_en_ft']; ?></td>
                    <td><?php echo $nu_dep_MP = $row['dep_MP'] ?></td>
                    <td><?php echo $nu_extraccion = $row['extraccion'] ?></td>
                    <td><?php echo $nu_deposito = $row['deposito'] ?></td>
                    <td><?php echo $nu_depositarle_al_movil = $row['dep_al_movil'] ?></td>
                    <td><?php echo $nu_queda_ft_en_caja = $row['queda_ft_en_caja'] ?></td>
                    <td><?php echo $nu_queda_voucher_en_caja = $row['queda_voucher_en_caja'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="grid">
            <div>
                <ul>
                    <li>ID: <?php echo $nu_id; ?></li>
                    <li>Fecha ultimo deposito: <?php echo $nu_fecha_dep; ?></li>
                    <li>Fecha Actual: <?php echo $nu_fecha_actual; ?></li>
                    <li>Movil: <?php echo $nu_movil; ?></li>
                    <li>N de semana del ultimo deposito: <?php echo $nu_semana_ult_dep; ?></li>
                    <li>N de Semana Actual: <?php echo $nu_semana_actual; ?></li>
                    <li>Imp semanas debe: <?php echo $nu_debe_cant_de_semanas; ?></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li></li>
                    <li>Paga en viajes: <?php echo $nu_paga_de_viajes; ?></li>
                    <li>Depositó en Voucher: <?php echo $nu_trajo_en_voucher; ?></li>
                    <li>Se le debe depositar al movil: <?php echo $nu_deuda_movil; ?></li>
                    <li>Diez % para base: <?php echo $nu_diez ?></li>
                    <li>noventa % para el movil: <?php echo $nu_noventa ?></li>
                    <li>Plata que deposito en efectivo: <?php echo $nu_dep_en_ft; ?></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li></li>
                    <li>Deposito en Mp: <?php echo $nu_dep_MP ?></li>
                    <li>Extraccion: <?php echo $nu_extraccion ?></li>
                    <li>Aporte a caja: <?php echo $nu_deposito ?></li>
                    <li>Depositarle al movil en su cuenta: <?php echo $nu_depositarle_al_movil ?></li>
                    <li>Plata que hay en caja: <?php echo $nu_queda_ft_en_caja ?></li>
                    <li>Plata en Voucher de caja: <?php echo $nu_queda_voucher_en_caja ?></li>
                </ul>
            </div>
            <?php



            /*
                    if ($nu_deuda_movil > $nu_debe_de_semanas) {
                    echo "Puede pagar semanas adeudadas";
                    echo "<br>";
                    echo "Semanas adeudadas: " . $semanas_que_puede_pagar = $nu_semana_actual - $nu_semana;
                    echo "<br>";
                    echo "Se le descuentan: " . $semana_que_puede = $semanas_que_puede_pagar * $abono_semanal . " de semanas adeudadas";
                    echo "<br>";
                    echo "Le Quedan:" . $le_quedan = $nu_pago_en_papel - $semana_que_puede;
                    } else {
                    echo "No le alcanza:";
                    }
                    */
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
    
    */
        ?>

</body>

</html>