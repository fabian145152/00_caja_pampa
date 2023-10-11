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

    <p>Usar la tabla caja_cont</p>

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

    //echo "Movil". $nu_movil;

    ?>
    <h1>Movil:<?php echo $nu_movil ?></h1>
    <br>
    <a href="inicio.php" class="btn btn-success">Volver</a>
    <nbsp></nbsp>
    <nbsp></nbsp>
    <a href="../../index.php" class="btn btn-success">Salir</a>


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
                <th>Fecha</th>
                <th>Movil</th>
                <th>Viaje No</th>
                <th>Reloj</th>
                <th>Adicional</th>
                <th>Espera</th>
                <th>Peaje</th>
                <th>Pago FT</th>
            </tr>
        </thead>

        <?php


        $caja = "SELECT * FROM `caja_cont` WHERE movil = $nu_movil ORDER BY fecha";
        $list_caja = $con->query($caja);


        while ($row = $list_caja->fetch_assoc()) {


        ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <td><?php echo $row['viaje_no'] ?></td>
                    <td><?php echo $row['reloj'] ?></td>
                    <td><?php echo $row['adi'] ?></td>
                    <td><?php echo $row['espera'] ?></td>
                    <td><?php echo $row['peaje'] ?></td>
                    <td><?php echo $row['pago_ft'] ?></td>
                </tr>
            </tbody>
        <?php
            $movil = $row['movil'];

            $total_reloj += $row['reloj'];
            $total_adi += $row['adi'];
            $total_espera += $row['espera'];
            $total_peaje += $row['peaje'];
            $total_ft += $row['pago_ft'];
        }
        ?>

    </table>
    <?php echo "MOVIL " . $nu_movil; ?>
    <br>
    <?php echo "Total reloj sumado: " . $total_reloj; ?>
    <br>
    <?php echo "Total de adicionales: " . $total_adi; ?>
    <br>
    <?php echo "total espera" . $total_espera; ?>
    <br>
    <?php echo "Total peajes: " . $total_peaje; ?>
    <br>
    <?php echo "Total pago en FT:" . $total_ft; ?>

    <div class="container">
        <?php
        echo "Deposito en Voucher: " . $tot_vou = $total_reloj + $total_adi;
        echo "<br>";
        echo "Deposito en Peajes "  . $total_peaje;
        echo "<br>";
        echo "Deposito en efectivo: " . $total_ft;
        echo "<br>";
        echo "Pagarle al movil: " . $pagapaga = $tot_vou * 0.90 + $total_peaje;
        echo "<br>";
        echo "Para base: " . $tot_vou * 0.1;
        ?>
    </div>


</body>

</html>