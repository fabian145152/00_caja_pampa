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
    include_once '../../includes/variables.php';
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
    $semana = date('W');




    ?>
    <br><br>
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

    $abono_semanal = $fila['abono'];     //importe semanal
    $x_viaje = $fila['x_viaje'];  //importe x viaje

    ?>
    <table class="table table-bordered table-sm table-hover" width="200" height="100">

        <div class="grid">
            <div>

                <ul>
                    <?php
                    echo "Abono Semanal: " . $abono = $fila['abono'];
                    echo "<br>";
                    echo "Paga x Viaje: " . $x_viaje = $fila['x_viaje'];
                    ?>
                    <li>
                        <h3>Datos Titular</h3>
                    </li>
                    <li>Nombre: <?php echo $fila['nombre_titu'] ?></li>
                    <li>Apellido: <?php echo $fila['apellido_titu'] ?></li>
                    <li>Direccion: <?php echo $fila['direccion_titu'] ?></li>
                    <li>Telefono: <?php echo $fila['cel_titu'] ?></li>
                    <li>DNI: <?php echo $fila['dni_titu'] ?></li>
                    <LI>Ini Facturación: <?php echo $cuenta_semanas = $fila['fecha_facturacion'] ?></LI>
                    <?php
                    include "cuenta_semanas.php";
                    ?>
                    <LI>Semanas desd el inicio: <?php echo $semanas ?></LI>
                </ul>
            </div>
            <?php


            ?>
            <div>
                <ul>
                    <li>
                        <h3>Datos Chofer Dia</h3>
                    </li>
                    <li>Nombre: <?php echo $fila['nombre_chof_1'] ?></li>
                    <li>Apellido: <?php echo $fila['apellido_chof_1'] ?></li>
                    <li>Direccion: <?php echo $fila['direccion_chof_1'] ?></li>
                    <li>Telefono: <?php echo $fila['cel_chof_1'] ?></li>
                    <li>DNI: <?php echo $fila['dni_chof_1'] ?></li>
                </ul>

            </div>

            <div>
                <ul>
                    <li>
                        <h3>Datos Chofer Noche</h3>
                    </li>
                    <li>Nombre: <?php echo $fila['nombre_chof_2'] ?></li>
                    <li>Apellido: <?php echo $fila['apellido_chof_2'] ?></li>
                    <li>Direccion: <?php echo $fila['direccion_chof_2'] ?></li>
                    <li>Telefono: <?php echo $fila['cel_chof_2'] ?></li>
                    <li>DNI: <?php echo $fila['dni_chof_2'] ?></li>
                </ul>
            </div>

            <div>
                <ul>
                    <li>
                        <h3>Datos de la Unidad</h3>
                    </li>
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
                <th>Sem deuda</th>
                <th>Viaje No</th>
                <th>CC</th>
                <th>Reloj</th>
                <th>Adicional</th>
                <th>Peaje</th>
                <th>Plus</th>

            </tr>
        </thead>

        <?php


        $caja = "SELECT * FROM voucher_validado WHERE movil = '$movil' ";
        $list_caja = $con->query($caja);

        $sql = "SELECT COUNT(*) total FROM voucher_validado";
        $result = mysqli_query($con, $sql);
        $fila = mysqli_fetch_assoc($result);

        $consulta = "SELECT * FROM voucher_validado WHERE movil = '$movil'";

        $query = mysqli_query($con, $consulta);
        $row = mysqli_fetch_assoc($query);

        //Acá cuentas la cantidad de registros
        $total_registros = mysqli_num_rows($query);

        echo "Viajes Registrados: " . $total_registros;


        //echo $fila;


        while ($row = $list_caja->fetch_assoc()) {
            $semana = $row['fecha'];
            $semana = date('W');




        ?>
            <tbody>
                <tr>

                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>

                    <td><?php

                        //********************************************
                        //estas 3 lineas extraen la semana de la fecha
                        //********************************************

                        $dia = $row['fecha'];
                        $rest = substr($dia, 0, -8);
                        //$fecha_actual = new DateTime();

                        //echo $dia;
                        $num_sem = date('W', strtotime($dia));
                        //echo $num_sem;



                        ?></td>
                    <td><?php
                        echo 52 - $num_sem;
                        ?></td>
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
            $total_peaje += $row['peaje'];
        }

        // TODOS LOS CALCULOS PARA COBRAR
        //----------------------------------------------------------------------------------------------------------------
        // 10% para Gastos de cuenta
        $des_de_diez = $total_reloj * .90;

        // 90% para el movil
        $diez = $total_reloj * .1;

        $afavor = $des_de_diez + $total_peaje;

        $cant_viajes = $fila['total'];
        $de_viajes = $fila['total'] * $x_viaje;
        $total_para_el_movil = $afavor - $de_viajes - $abono_semanal;

        //---------------------------------------------------------------------------------------------------------------



        ?>

    </table>

    <table class="table table-bordered table-sm table-hover" width="200" height="100">
        <div class="grid">
            <?php
            //echo "MOVIL " . $nu_movil; 
            ?>

            <div>
                <ul>
                    <li><?php echo "Semana: " . $semana ?></li>
                    <li><?php echo "Abono semanal: " . "$" . $abono_semanal . " " ?></li> <!-- ABONO SEMANAL -->
                    <li><?php echo 'Cantidad de viajes: ' . $cant_viajes; ?></li> <!-- CANTIDAD DE VIAJES -->
                    <li><?php echo "Costo x viaje: " . "$" . $x_viaje . "-" ?></li> <!-- ABONO X VIAJE -->
                </ul>
            </div>
            <div>
                <ul>
                    <li><?php echo "Total reloj sumado: " . "$" . $total_reloj . "-" ?></li> <!-- IPRTE DEL RELOJ -->
                    <li><?php echo "total espera: " . "$" . $total_espera . "-" ?></li> <!-- ESPERA -->
                    <li><?php echo "Total peajes: " . "$" . $total_peaje . "-" ?></li> <!-- PEAJES -->
                    <li><?php echo "Paga por los viajes: " . "$" . $de_viajes . "-" ?></li> <!-- PAGA X VIAJE -->
                </ul>
            </div>
            <div>
                <ul>
                    <li><?php echo "10% para gastos cuenta=" . "$" . $diez . "-" ?></li> <!-- 10% PARA BASE -->
                    <li><?php echo "Total - 10% de des= " . "$" . $des_de_diez . "-" ?></li> <!-- PARA -->
                    <li><?php
                        if ($total_para_el_movil > 0) {
                            echo "A FAVOR: " . $total_para_el_movil;
                        } elseif ($total_para_el_movil == 0) {
                            echo $total_para_el_movil;
                        } else {

                            echo "DEBE: " . $total_para_el_movil;
                        }

                        ?>
                        <form action="lee_deudor/deudor.php" method="post">
                            <input type="hidden" id="movil" name="movil" value="<?php echo $nu_movil ?>">
                            <input type="hidden" id="suma_reloj" name="suma_reloj" value="<?php echo  $suma_todo = $total_reloj + $total_espera ?>">
                            <input type="hidden" id="para_base" name="para_base" value="<?php echo $diez ?>">
                            <input type="hidden" id="semanas" name="semanas" value="<?php echo $semanas ?>">
                            <input type="hidden" id="abono" name="abono" value="<?php echo $abono ?>">
                            <input type="hidden" id="x_viaje" name="x_viaje" value="<?php echo $x_viaje ?>">
                            <input type="hidden" id="cant_viaje" name="cant_viaje" value="<?php echo $total_registros ?>">



                            <?php




                            ?>

                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <button type="submit" class="btn btn-danger">GUARDAR</button>

                        </form>

                </ul>
            </div>


        </div>
    </table>

</body>

</html>