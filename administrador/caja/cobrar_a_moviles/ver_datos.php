<?php
/*
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';
    */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESUMEN MOVIL</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/ver_datos.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>
    <script>
        function deleteProduct(cod_unidad) {

            bootbox.confirm("Desea Eliminar?" + cod_unidad, function(result) {
                /*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
                if (result) {
                    window.location = "delete_unidad.php?q=" + cod_unidad;
                }
                /*  La ?q es como si fuera el metodo $_GET */
            });
        }

        /* ahora viene la funcion update*/
        function updateProduct(cod_unidad) {
            window.location = "editar_obs.php?q=" + cod_unidad;
        }
    </script>
</head>

<body>
    <style>
        body {
            margin: 1% 10%;
            zoom: 80%;
        }
    </style>
    <!-- <p>Usar la tabla caja_cont</p> -->

    <?php
    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    include_once '../../../includes/funciones.php';

    $con = openCon('../../../config/db_admin.ini');

    $con->set_charset("utf8mb4");

    $total_reloj = 0;
    $total_adi = 0;
    $total_espera = 0;
    $total_peaje = 0;
    $total_ft = 0;
    $total_plus = 0;
    $total_equi = 0;
    $nu_movil = $_POST["movil"];

    $movil = "A" . $nu_movil;

    date_default_timezone_set('America/Mexico_City');
    $fechaActual = date('Y-m-d');
    $semana = date('W');


    ?>
    <p>Ya esta echa la consulta de el importe semanal </p>
    <p>Estaba trabajando con la consulta del importe por viaje, esta incompleta</p>
    <h5 style="text-align: center;"><?php echo $fechaActual . " " . "Semana: " . $semana ?>

        <?php echo "Movil: " . $nu_movil;

        ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="inicio.php" class="btn btn-success">Volver</a>
        <nbsp></nbsp>
        <nbsp></nbsp>
        <a href="../../../salir.php" class="btn btn-success">Salir</a>
    </h5>

    <?php
    # consulta todos los datos del registro de el movil en cuestioon

    $ver_datos = "SELECT * FROM completa WHERE movil = '$nu_movil'";
    $muestra_todo = $con->query($ver_datos);
    $fila = $muestra_todo->fetch_assoc();

    # Consulta el importe de la semana del movil en cuestion

    $abono_semana = "SELECT * FROM semanas WHERE movil = '$nu_movil'";
    $ver_semana = $con->query($abono_semana);
    $ver_sem = $ver_semana->fetch_assoc();

    # Consulta el importe x viaje

    //$abono_viaje = "SELECT * FROM importe_viajes WHERE";



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
                    <?php $deuda_anterior = $fila['deuda_anterior'] ?>
                </ul>
            </div>
            <div>
                <ul>
                    <?php
                    $msg = $fila['obs'];

                    if (empty($msg)) {
                        echo "<li>Movil: " . $movil . "</li>";
                        echo "<li><strong>No dejo recordatorios</strong></li>";
                    ?>
                        <li><a href="#" onclick="updateProduct(<?php echo $fila['id']; ?>)">Grabar recordatorio nuevo</a></li>
                    <?php
                    } else {
                    ?>
                        <li><strong><?php echo $fila['obs']; ?></strong></li>
                        <li><a href="#" onclick="updateProduct(<?php echo $fila['id']; ?>)" class="btn btn-warning">Actualizar</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <!-- </div>-->

            <?php


            $caja = "SELECT * FROM voucher_validado WHERE movil = '$movil' ";
            $list_caja = $con->query($caja);

            $sql = "SELECT COUNT(*) total FROM voucher_validado";
            $result = mysqli_query($con, $sql);
            $fila = mysqli_fetch_assoc($result);

            $consulta = "SELECT * FROM voucher_validado WHERE movil = '$movil'";

            $query = mysqli_query($con, $consulta);
            $row = mysqli_fetch_assoc($query);



            # cuentas la cantidad de registros
            $total_registros = mysqli_num_rows($query);

            while ($row = $list_caja->fetch_assoc()) {
                $semana = $row['fecha'];
                $semana = date('W');

                $row['id'];
                $row['movil'];
                $fecha = $row['fecha'];

                /*  ver esta parte, cambiar el formato de la fecha */

                date_default_timezone_set('America/Mexico_City');

                //echo $fecha = '14-02-2024';    //Fecha de la cual obtendremos la semana
                $fechaSegundos = strtotime($fecha);    // parseamos la fecha a una marca de tiempo Unix 

                $semana = date('W', $fechaSegundos);    // Obtenemos el número de semana con el parametro W y la fecha en Unix
                $semana;    // Imprimimos el número de semana

                //echo date("Y-m-d", strtotime($Fecha));

                $fecha_como_va = str_replace("/", "-", $fecha);
                date("Y-m-d", strtotime($fecha_como_va));

                $row['viaje_no'];
                $cuenta = $row['cc'];
                $row['reloj'];
                $row['adicional'];
                $row['equipaje'];
                $row['peaje'];
                $row['plus'];

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
        </div>
    </table>

    <?php


    ?>

    <table class="table table-bordered table-sm table-hover" width="200" height="100">
        <div class="grid">
            <div>
                <ul>

                    <li><?php echo "Semana ultimo deposito: " . $semana ?></li>
                    <li><?php echo "Fecha ultimo deposito: " . $fecha ?></li>
                    <li><?php echo "Semana actual: " . $semana_actual = date('W'); ?></li>
                    <li><?php echo "Viajes Registrados: " . $total_registros; ?></li>
                    <li><?php echo "Paga por viaje: " . $abono_viaje_1; ?></li>
                    <li><?php echo "Abono semanal: " . "$" . $ver_sem['x_semana'] . "-" ?></li>
                    <li><?php echo "Debe de semanas atrasadas: " . $ver_sem['total']; ?></li>
                    <br><br>

                    <?php $total_de_vaucher =
                        $total_reloj +
                        $total_adi +
                        $total_peaje +
                        $total_equi +
                        $total_plus; ?>

                    <li><?php echo "Total de voucher: " . "$" . $total_de_vaucher  ?></li>
                    <li><?php echo "Debe de viajes: " . $paga_de_viajes = $total_registros * $abono_viaje_1; ?> </li>
                    <li><?php echo "Deuda anterior: " . $deuda_anterior ?></li>


                    <li>
                        <h5>Sale de voucher - paga x viajes - semanas adeudadas y se le quita en 10%</h5>
                        <?php
                        $para_mov_descuentos = $total_de_vaucher - $paga_de_viajes - $sem_adeudadas;
                        $quedan_al_movil = $para_mov_descuentos * .9;


                        if ($quedan_al_movil < 1) {
                        ?>
                            <p id="credito"><strong>DEBE PAGAR: <?php echo $quedan_al_movil . '</p> </strong>';
                                                            } elseif ($quedan_al_movil > 1) {
                                                                ?>
                                    <p id="deposito"><strong>DEPOSITARLE: <?php echo $quedan_al_movil . '</strong></p> ';
                                                                        }
                                                                        //echo "<strong>ROJO</strong> depositarle al movil";
                                                                        //echo "<p><strong>AMARILLO</strong> tiene que pagar</p>";
                                                                            ?>
                    </li>

                </ul>

            </div>
            <div>
                <ul>
                    <form action="deudor.php" method="post">
                        <input type="hidden" id="movil" name="movil" value="<?php echo $nu_movil ?>">
                        <input type="hidden" id="fecha_voucher" name="fecha_voucher" value="<?php echo $fecha ?>">
                        <input type="hidden" id="abono_semanal" name="abono_semanal" value="<?php echo $abono_semanal ?>">
                        <input type="hidden" id="paga_de_viajes" name="paga_de_viajes" value="<?php echo $paga_de_viajes ?>">
                        <input type="hidden" id="pago_en_voucher" name="pago_en_voucher" value="<?php echo $total_de_vaucher ?>">
                        <input type="hidden" id="quedan_para_el_movil" name="quedan_para_el_movil" value="<?php echo $para_mov ?>">
                        <input type="hidden" id="quedan_al_movil" name="quedan_al_movil" value="<?php echo $quedan_al_movil ?>">
                        <input type="hidden" id="total_registros" name="total_registros" value="<?php echo $total_registros ?>">
                        <input type="hidden" id="para_base" name="para_base" value="<?php echo  $para_base ?>">
                        <input type="hidden" id="semana" name="semana" value="<?php echo $semana; ?>">
                        <input type="hidden" id="semanas_adeudadas" name="semanas_adeudadas" value="<?php echo $sem_adeudadas; ?>">
                        <input type="hidden" id="extraccion" name="extraccion">
                        <input type="hidden" id="deposito" name="deposito">
                        <input type="hidden" id="dep_al_movil" name="dep_al_movil">
                        <input type="hidden" id="deuda_anterior" name="deuda_anterior" value="<?php echo $deuda_anterior ?>">


                        <p><strong>Pago en Efectivo:</strong></p>
                        <input type="text" id="ft" name="ft">
                        <br><br>
                        <p>
                            <strong>Paga X MecadoPago</strong>
                        </p>
                        <input type="text" id="MP" name="MP">
                        <br><br>
                        <p><strong>Paga deuda anterior</strong></p>
                        <input type="text" id="paga_deuda_ant" name="paga_deuda_ant">
                        <br><br>
                        <button type="submit" class="btn btn-danger">GUARDAR</button>
                    </form>

                </ul>

            </div>
            <div>
                <ul>
                    <li> <strong>ROJO</strong> depositarle al movil</li>
                    <li> <strong>AMARILLO</strong> tiene que pagar </li>
                </ul>
                <ul>
                    <li>Si entra x Mercado pago</li>
                    <li>Generar un pago en FT y extraerlo</li>
                </ul>
            </div>

        </div>
    </table>

</body>

</html>
<?php
//}
