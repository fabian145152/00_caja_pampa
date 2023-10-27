<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAJA</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <style>
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

    <!-- <p>Usar la tabla caja_cont</p> -->

    <?php
    include_once '../../includes/db.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $total_reloj = 0;
    $total_adi = 0;
    $total_espera = 0;
    $total_peaje = 0;
    $total_ft = 0;

    $nu_movil = $_GET["movil"];

    $movil = "A" . $nu_movil;

    date_default_timezone_set('America/Mexico_City');
    $fechaActual = date('d-m-Y');
    $fechaActual;
    $semana = date('W');

    ?>

    <h5 style="text-align: center;"><?php echo $fechaActual . " " . "Semana: " . $semana ?>

        Movil:<?php echo $nu_movil ?>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="inicio.php" class="btn btn-success">Volver</a>
        <nbsp></nbsp>
        <nbsp></nbsp>
        <a href="../../index.php" class="btn btn-success">Salir</a>
    </h5>

    <?php
    $ver_datos = "SELECT * FROM completa WHERE movil = '$nu_movil'";

    $muestra_todo = $con->query($ver_datos);

    $fila = $muestra_todo->fetch_assoc();

    $ver_abono = "SELECT * FROM abonos WHERE 1";
    $muestra_abono = $con->query($ver_abono);
    $abono = $muestra_todo->fetch_assoc();



    echo $abono['id'];
    echo $abono['abono'];
    echo $abono['importe'];

    ?>
    <table class="table table-bordered table-sm table-hover" width="200" height="100">

        <div class="grid">
            <div>

                <ul>
                    <?php
                    $abono = $fila['abono'];

                    ?>
                    <li><strong>Datos Titular</strong></li>
                    <li>Nombre: <?php echo $fila['nombre_titu'] ?></li>
                    <li>Apellido: <?php echo $fila['apellido_titu'] ?></li>
                    <li>Direccion: <?php echo $fila['direccion_titu'] ?></li>
                    <li>Telefono: <?php echo $fila['cel_titu'] ?></li>
                    <li>DNI: <?php echo $fila['dni_titu'] ?></li>
                </ul>
            </div>

            <div>
                <ul>
                    <li><strong>Datos Chofer Dia</strong></li>
                    <li>Nombre: <?php echo $fila['nombre_chof_1'] ?></li>
                    <li>Apellido: <?php echo $fila['apellido_chof_1'] ?></li>
                    <li>Direccion: <?php echo $fila['direccion_chof_1'] ?></li>
                    <li>Telefono: <?php echo $fila['cel_chof_1'] ?></li>
                    <li>DNI: <?php echo $fila['dni_chof_1'] ?></li>
                </ul>

            </div>

            <div>
                <ul>

                    <li><strong>Datos Chofer Noche</strong></li>
                    <li>Nombre: <?php echo $fila['nombre_chof_2'] ?></li>
                    <li>Apellido: <?php echo $fila['apellido_chof_2'] ?></li>
                    <li>Direccion: <?php echo $fila['direccion_chof_2'] ?></li>
                    <li>Telefono: <?php echo $fila['cel_chof_2'] ?></li>
                    <li>DNI: <?php echo $fila['dni_chof_2'] ?></li>
                </ul>
            </div>

            <div>
                <ul>

                    <li><strong>Datos de la Unidad</strong></li>
                    <li>Marca: <?php echo $fila['marca'] ?></li>
                    <li>Modelo: <?php echo $fila['modelo'] ?></li>
                    <li>Dominio: <?php echo $fila['dominio'] ?></li>
                    <li>Año: <?php echo $fila['año'] ?></li>
                </ul>
            </div>


            </thead>


            </p>

        </div>
        <thead>

            <tr>
                <th>Id</th>
                <th>Movil</th>
                <th>Fecha</th>
                <th>Semana</th>
                <th>Viaje No</th>
                <TH>c/c</TH>
                <th>Reloj</th>
                <th>Adicional</th>
                <th>EQUIPAJE</th>
                <th>Peaje</th>
                <th>Fecha</th>
              
            </tr>
        </thead>

        <?php


        $caja = "SELECT * FROM voucher_validado WHERE movil = '$movil' ";
        $list_caja = $con->query($caja);

        $sql = "SELECT COUNT(*) total FROM voucher_validado";
        $result = mysqli_query($con, $sql);
        $fila = mysqli_fetch_assoc($result);


        while ($row = $list_caja->fetch_assoc()) {
            $semana = $row['fecha'];
            $semana = date('W');

        ?>
            <tbody>
                <tr>

                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $semana ?></td>
                    <td><?php echo $row['viaje_no'] ?></td>
                    <td><?php echo $row['cc'] ?></td>
                    <td><?php echo $row['reloj'] ?></td>
                    <td><?php echo $row['adicional'] ?></td>
                    <td><?php echo $row['equipaje'] ?></td>
                    <td><?php echo $row['peaje'] ?></td>
                    <td><?php echo $row['plus'] ?></td>
                </tr>
            </tbody>
        <?php

            $movil = $row['movil'];

            $total_reloj += $row['reloj'];
            $total_adi += $row['adicional'];
            //    $total_espera += $row['espera'];
            $total_peaje += $row['peaje'];
            //    $total_ft += $row['pago_ft'];
        }


        //calcula el importe total del viaje 
        //sin peajes 
        //y el descuento del 10

        $total_de_viaje = $total_reloj + $total_adi + $total_espera;
        $des_de_diez = $total_reloj * .90;
        $diez = $total_reloj * .1;

        $afavor = $des_de_diez + $total_peaje;

        //selecciono el valor del abono



        
        $tabla_abono = "SELECT * FROM `abonos` WHERE id=" . $abono;
        $res_abono = $con->query($tabla_abono);
        while ($vea = $res_abono->fetch_array()) {
            $vea['importe'];
            $vea['abono'];
            "<br>";
            $nombre_importe = $vea['abono'];
            $importe_semana = $vea['importe'];
        }


        echo "aca hacer la lectura de el importe de cada viaje";




        ?>

    </table>

    <table class="table table-bordered table-sm table-hover" width="200" height="100">
        <div class="grid">
            <?php "MOVIL " . $nu_movil; ?>
            <ul>
                <li><?php echo $nombre_importe . " " . $importe_semana ?></li>
                <li><?php echo 'Número de viajes: ' . $fila['total']; ?></li>
                <li><?php echo "Semana: " . $semana ?></li>
                <li><?php echo "Total reloj sumado: " . "$" . $total_reloj . "-" ?></li>
                <li><?php echo "Total de adicionales: " . "$" . $total_adi . "-" ?></li>
                <li><?php echo "total espera: " . "$" . $total_espera . "-" ?></li>
                <li></li>
                <li><?php echo "10% para gastos cuenta=" . "$" . $diez . "-" ?></li>
                <li><?php echo "Total peajes: " . "$" . $total_peaje . "-" ?></li>
                <li><?php echo "<strong>Total - 10% de des= " . "$" . $des_de_diez . "-" ?></strong></li>
                <li><?php echo "<strong>A favor del movil: " . $afavor ?></strong></li>

            </ul>

        </div>
    </table>

</body>

</html>