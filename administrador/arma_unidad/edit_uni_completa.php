<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR UNI COMPLETA</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <style>
        #columnas {
            column-count: 2;
            column-gap: 20px;
            /*column-rule: 4px double black;*/
            list-style: none;
        }
    </style>
</head>

<body>

    <?php
    //Esta linea incluye los valores fijos de la semana y costo por viaje
    include '../../includes/variables.php';

    include_once '../../includes/db.php';
    /* en ese archivo estan las funciones */
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");
    $id_upd = $_GET['q'];
    //echo $id_upd;
    $sql = "SELECT * FROM completa WHERE id=" . $id_upd;
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    //}

    ?>






    <div class="container">
        <h3 class="text-center">EDITAR UNIDAD COMPLETA</h3>
        <div class="row">
            <div id="contenedor"> <!-- esta linea intenta hacer 2 columnas -->
                <div class="col-md-12">
                    <form class="form-group" accept=-"charset utf8" action="update_uni_completa.php" method="post">
                        <div class="form-group">
                            <div class="from-group">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Movil</label>
                                <input type="text" class="form-control input-sm" id="movil" name="movil" value="<?php echo  $row['movil']; ?>">
                            </div>
                        </div>

                        <div id="columnas">
                            <div class="form-group">
                                <label class="control-label">Nombre Titular</label>
                                <input type="text" class="form-control input-sm" id="nom_titu" name="nom_titu" value="<?php echo  $row['nombre_titu']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Apellido Titu</label>
                                <input type="text" class="form-control" id="ape_titu" name="ape_titu" value="<?php echo  $row['apellido_titu']; ?>">
                            </div>

                        </div>
                        <br><br>
                        <div id="columnas">

                            <div class="form-group">
                                <label class="control-label">DNI Titular</label>
                                <input type="text" class="form-control" id="dni_titu" name="dni_titu" value="<?php echo  $row['dni_titu']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Direccion Titular</label>
                                <input type="text" class="form-control" id="dir_titu" name="dir_titu" value="<?php echo  $row['direccion_titu']; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div id="columnas">

                            <div class="form-group">
                                <label class="control-label">CP Titular</label>
                                <input type="text" class="form-control" id="cp_titu" name="cp_titu" value="<?php echo  $row['cp_titu']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Celular Titular</label>
                                <input type="text" class="form-control" id="cel_titu" name="cel_titu" value="<?php echo  $row['cel_titu']; ?>">
                            </div>

                        </div>
                        <br><br>
                        <div id="columnas">

                            <!-- CHOFER DIA  -->
                            <div class="form-group">
                                <label class="control-label">Nombre Chofer dia</label>
                                <input type="text" class="form-control" id="nom_chof_1" name="nom_chof_1" value="<?php echo  $row['nombre_chof_1']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">apellido Chofer dia</label>
                                <input type="text" class="form-control" id="ape_chof_1" name="ape_chof_1" value="<?php echo  $row['apellido_chof_1']; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div id="columnas">
                            <div class="form-group">
                                <label class="control-label">DNI Chofer dia</label>
                                <input type="text" class="form-control" id="dni_chof_1" name="dni_chof_1" value="<?php echo  $row['dni_chof_1']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Direccion Chofer dia</label>
                                <input type="text" class="form-control" id="dir_chof_1" name="dir_chof_1" value="<?php echo  $row['direccion_chof_1']; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div id="columnas">
                            <div class="form-group">
                                <label class="control-label">CP chofer dia</label>
                                <input type="text" class="form-control" id="cp_chof_1" name="cp_chof_1" value="<?php echo  $row['cp_chof_1']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Celular Chofer dia</label>
                                <input type="text" class="form-control" id="cel_chof_1" name="cel_chof_1" value="<?php echo  $row['cel_chof_1']; ?>">
                            </div>

                        </div>

                        <div id="columnas">

                            <!--  CHOFER NOCHE  -->
                            <div class="form-group">
                                <label class="control-label">Nombre Chofer noche</label>
                                <input type="text" class="form-control" id="nom_chof_2" name="nom_chof_2" value="<?php echo  $row['nombre_chof_2']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Apellido Chofer noche</label>
                                <input type="text" class="form-control" id="ape_chof_2" name="ape_chof_2" value="<?php echo  $row['apellido_chof_2']; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div id="columnas">
                            <div class="form-group">
                                <label class="control-label">DNI Chofer noche</label>
                                <input type="text" class="form-control" id="dni_chof_2" name="dni_chof_2" value="<?php echo  $row['dni_chof_2']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Direccion Chofer noche</label>
                                <input type="text" class="form-control" id="dir_chof_2" name="dir_chof_2" value="<?php echo  $row['direccion_chof_2']; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div id="columnas">
                            <div class="form-group">
                                <label class="control-label">CP chofer noche</label>
                                <input type="text" class="form-control" id="cp_chof_2" name="cp_chof_2" value="<?php echo  $row['cp_chof_2']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Celular Chofer noche</label>
                                <input type="text" class="form-control" id="cel_chof_2" name="cel_chof_2" value="<?php echo  $row['cel_chof_2']; ?>">
                            </div>

                            <!-- DATOS DEL AUTO  -->

                        </div>
                        <br><br>
                        <div id="columnas">

                            <div class="form-group">
                                <label class="control-label">Licencia</label>
                                <input type="text" class="form-control" id="licencia" name="licencia" value="<?php echo  $row['licencia_titu']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Auto Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca" value="<?php echo  $row['marca']; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div id="columnas">
                            <div class="form-group">
                                <label class="control-label">Auto Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo  $row['modelo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Dominio</label>
                                <input type="text" class="form-control" id="dominio" name="dominio" value="<?php echo  $row['dominio']; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div id="columnas">
                            <div class="form-group">
                                <label class="control-label">Auto Año</label>
                                <input type="text" class="form-control" id="año" name="año" value="<?php echo  $row['año']; ?>">
                            </div>


                        </div>
                        <br><br>
                        <div id="columnas">

                            <div class="form-group">
                                <label class="control-label">ABONO SEMANAL</label>
                                <select name="abono_semanal" id="abono_semanal" class="form-control" require>

                                    <option value="<?php echo $abono_porteño_pampa ?>">Semana Porteño Pampa: <?php echo "$" . $abono_porteño_pampa . "-" ?></option>
                                    <option value="<?php echo $abono_basico ?>">Abono Basico: <?php echo "$" . $abono_basico . "-" ?></option>
                                    <option value="<?php echo $abono_pasea_carteles ?>">Abono Pasea Carteles: <?php echo "$" . $abono_pasea_carteles . "-" ?></option>
                                    <option value="<?php echo $abono_tropas ?>">Abono Tropa: <?php echo "$" . $abono_tropas . "-" ?></option>
                                    <option value="<?php echo $abono_super_especial ?>">Abono Super Especial: <?php echo "$" . $abono_super_especial . "-" ?></option>
                                    <option value="<?php echo $abono ?>">Abono 0: <?php echo "$" . $abono . "-" ?></option>
                                    <option value="<?php echo $abono_taller ?>">Abono Taller: <?php echo "$" . $abono_taller . "-" ?></option>
                                    <option value="<?php echo $abono_con_bonificacion ?>">Abono con Bonificacion: <?php echo "$" . $abono_con_bonificacion . "-" ?></option>
                                    <option value="<?php echo $abono_taller_especial ?>">Abono Taller Especial: <?php echo "$" . $abono_taller_especial . "-" ?></option>
                                    <option value="<?php echo $abono_tropa_especial ?>">Abono Tropa Especial: <?php echo "$" . $abono_tropa_especial . "-" ?></option>
                                    <option value="<?php echo $abono_no_te_vayas ?>">Abono no te Vayas: <?php echo "$" . $abono_no_te_vayas . "-" ?></option>
                                    <option value="<?php echo $abono_especial ?>">Abono Especial: <?php echo "$" . $abono_especial . "-" ?></option>
                                    <option value="<?php echo $abono_taller_pampa ?>">Abono Taller Pampa: <?php echo "$" . $abono_taller_pampa . "-" ?></option>
                                    <option value="<?php echo $acuerdo_sin_aumento ?>">Acuerdo sin Aumento: <?php echo "$" . $acuerdo_sin_aumento . "-" ?></option>
                                    <option value="<?php echo $abono_bonificacion_pampa ?>">Abono Bonificacion Pampa: <?php echo "$" . $abono_bonificacion_pampa . "-" ?></option>
                                    <option value="<?php echo $abono_tropa_diaz ?>">Abono Tropa Diaz: <?php echo "$" . $abono_tropa_diaz . "-" ?></option>
                                    <option value="<?php echo $abono_bonificado ?>">Abono Bonificado: <?php echo "$" . $abono_bonificado . "-" ?></option>
                                    <option value="<?php echo $abono_porte ?>">Abono Porteño: <?php echo "$" . $abono_porte . "-" ?></option>

                                </select>
                            </div>

                            <?php
                            if($abono_viaje_1)
                            ?>


                            <div class="form-group">
                                <label class="control-label">ABONO X VIAJE</label>
                                <select name="abono_x_viaje" id="abono_x_viaje" class="form-control" require>
                                    <option value="<?php echo $abono_viaje_1 ?> ">Abono 1 <?php echo "$" . $abono_viaje_1 . "-" ?></option>
                                    <option value="<?php echo $abono_viaje_2 ?> ">Abono 2 <?php echo "$" . $abono_viaje_2 . "-" ?></option>
                                </select>
                            </div>





                        </div>
                        <br><br>
                        <div id="columnas">

                            <div class="form-group">
                                <label class="control-label">Fecha de inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo  $row['fecha_inicio']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">inicio de facturacion</label>
                                <input type="date" class="form-control" id="fecha_fact" name="fecha_fact" value="<?php echo  $row['fecha_facturacion']; ?>">
                            </div>
                        </div>
                        <div class="text-center">
                            <br>
                            <input type="submit" class="btn btn-primary" value="GUARDAR DATOS">
                        </div>


                    </form>
                </div>
            </div>
        </div>

</body>

</html>