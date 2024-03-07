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
    $total_plus = 0;
    $total_equi = 0;
    $nu_movil = $_GET["movil"];

    $movil = "A" . $nu_movil;

    date_default_timezone_set('America/Mexico_City');
    $fechaActual = date('Y-m-d');
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

                    <li>
                        <h3>Datos Titular</h3>
                    </li>
                    <li>Nombre: <?php echo $fila['nombre_titu'] ?></li>
                    <li>Apellido: <?php echo $fila['apellido_titu'] ?></li>
                    <li>Direccion: <?php echo $fila['direccion_titu'] ?></li>
                    <li>Telefono: <?php echo $fila['cel_titu'] ?></li>
                    <li>DNI: <?php echo $fila['dni_titu'] ?></li>
                    <li>INICIO FACT: <?php echo $cuenta_semanas = $fila['fecha_facturacion'] ?></li>




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
                <th>Id ok</th>
                <th>Movil ok</th>

                <th>Semana</th>
                <th>Fecha Voucher</th>
                <th>Viaje No</th>
                <th>CC</th>
                <th>Reloj</th>
                <th>Adicional</th>
                <th>Equipaje</th>
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




        //echo $fila;


        while ($row = $list_caja->fetch_assoc()) {
            $semana = $row['fecha'];
            $semana = date('W');




        ?>
            <tbody>
                <tr>

                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <!-- <td><?php $fecha = $row['fecha'] ?></td> -->
                    <td>
                        <?php

                        /*  ver esta parte, cambiar el formato de la fecha */

                        date_default_timezone_set('America/Mexico_City');


                        //echo $fecha = '14-02-2024';    //Fecha de la cual obtendremos la semana
                        $fechaSegundos = strtotime($fecha);    // parseamos la fecha a una marca de tiempo Unix 

                        $semana = date('W', $fechaSegundos);    // Obtenemos el número de semana con el parametro W y la fecha en Unix
                        echo  $semana;    // Imprimimos el número de semana

                        //echo date("Y-m-d", strtotime($Fecha));
                        ?>
                    </td>
                    <td><?php $fecha_como_va = str_replace("/", "-", $fecha);
                        echo date("Y-m-d", strtotime($fecha_como_va));
                        ?></td>



                    <td><?php echo $row['viaje_no'] ?></td>
                    <td><?php echo $cuenta = $row['cc'] ?></td>
                    <td><?php echo $row['reloj'] ?></td>
                    <td><?php echo $row['adicional'] ?></td>
                    <td><?php echo $row['equipaje'] ?></td>
                    <td><?php echo $row['peaje'] ?></td>
                    <td><?php echo $row['plus'] ?></td>
                </tr>
            </tbody>
        <?php
            if ($row['cc'] > 1) {

                $movil = $row['movil'];

                $total_reloj += $row['reloj'];
                $total_adi += $row['adicional'];
                $total_equi += $row['equipaje'];
                $total_peaje += $row['peaje'];
                $total_plus += $row['plus'];
            }
        }
        ?>

    </table>
    <table class="table table-bordered table-sm table-hover" width="200" height="100">
        <div class="grid">
            <div>
                <ul>
                    <li><?php echo "Semana: " . $semana ?></li>
                    <li><?php echo "Fecha ultimo deposito: " . $fecha ?></li>
                    <li><?php $total_de_vaucher =
                            $total_reloj +
                            $total_adi +
                            $total_peaje +
                            $total_equi +
                            $total_plus;
                        echo "Total de voucher: " . "$" . $total_de_vaucher . "-"; ?></li>
                    <li><?php echo "Abono semanal: " . "$" . $abono_semanal . "-" ?></li>
                    <li><?php echo "Viajes Registrados: " . $total_registros; ?></li>
                    <li><?php echo "Paga por viaje: " . $abono_viaje_1; ?></li>
                    <li><?php echo "Total de viajes: " . $paga_de_viajes = $total_registros * $abono_viaje_1 ?></li>
                    <li><?php

                        $para_mov = $total_de_vaucher * .9;

                        $quedan_al_movil = $para_mov - $abono_semanal - $paga_de_viajes;

                        if ($quedan_al_movil < 1) {
                        ?> <style>
                                #credito {
                                    background-color: #FBff03;
                                    font-size: 23px;
                                }
                            </style>
                            <p id="credito"><strong>Tiene que pagar: <?php echo $quedan_al_movil . '</p> </strong>';
                                                                    } elseif ($quedan_al_movil > 1) {
                                                                        ?>
                                    <style>
                                        #deposito {
                                            background-color: #FB0003;
                                            font-size: 23px;
                                        }
                                    </style>
                                    <p id="deposito"><strong>DEPOSITARLE: <?php echo $quedan_al_movil . '</p> </strong>';
                                                                        }
                                                                        echo "<br>";
                                                                        echo "Quedan para base: " . $para_base = $total_de_vaucher * .1 . "  Si es negativo el movil tiene que sepositar este monto";
                                                                        echo "<br>";
                                                                        echo "<br>";
                                                                        $largo = strlen($movil);

                                                                        if ($largo === 3) {
                                                                            $movil = substr($movil, -3);
                                                                            $numero_de_movil = "0" . $movil;
                                                                        } elseif ($largo === 4) {
                                                                            $numero_de_movil = $movil;
                                                                            $movil = substr($movil, -4);
                                                                        }
                                                                        echo $numero_de_movil . " ";
                                                                        if ($movil >= 0 && $movil <= 999) {
                                                                            echo  "Porteño";
                                                                        } elseif ($movil >= 1000 && $movil <= 1999) {
                                                                            echo "Buenos Aires ";
                                                                        } elseif ($movil >= 2000 && $movil <= 2999) {
                                                                            echo "Pampa";
                                                                        } elseif ($movil >= 3000 && $movil <= 3000) {
                                                                            echo "Baet";
                                                                        } elseif ($movil > 3001) {
                                                                            echo "Cualquiera...";
                                                                        }
                                                                            ?>
                    </li>

                </ul>
            </div>
            <div>

                <ul>


                    <form action="deudor.php" method="post">

                        <input type="hidden" id="movil" name="movil" value="<?php echo $nu_movil ?>">
                        <input type="hidden" id="fecha" name="fecha_actual" value="<?php echo $fecha ?>">
                        <input type="hidden" id="abono_semanal" name="abono_semanal" value="<?php echo $abono_semanal ?>">
                        <input type="hidden" id="pago_en_voucher" name="pago_en_voucher" value="<?php echo $total_de_vaucher ?>">
                        <input type="hidden" id="quedan_para_el_movil" name="quedan_para_el_movil" value="<?php echo $para_mov ?>">
                        <input type="hidden" id="quedan_al_movil" name="quedan_al_movil" value="<?php echo $quedan_al_movil ?>">
                        <input type="hidden" id="total_registros" name="total_registros" value="<?php echo $total_registros ?>">
                        <input type="hidden" id="para_base" name="para_base" value="<?php echo  $para_base ?>">
                        <input type="hidden" id="semana" name="semana" value="<?php echo $semana; ?>">

                        <p>Pago Ft:</p>

                        <input type="text" id="ft" name="ft">
                        <?php
                        echo "<br>";
                        echo "<br>";
                        ?>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-danger">GUARDAR</button>

                    </form>

                </ul>

            </div>
            <div>
                <ul>
                    <li>Si entra x Mercado pago</li>
                    <li>Generar un pago en FT y extraerlo</li>
                </ul>
            </div>

        </div>
    </table>

</body>

</html>