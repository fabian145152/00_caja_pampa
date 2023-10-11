<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARMA UNIDADES</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/form.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
</head>

<body>
    <?php

    //$abono = 0;


    include_once '../../includes/db.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");


    $sqltitulares = "SELECT id, nombre_titu, apellido_titu, direccion_titu, dni_titu, cel_titu FROM titulares WHERE 1";
    $result = $con->query($sqltitulares);
    $titu = $result->fetch_assoc();

    $sqlchoferes = "SELECT id, nombre_chof, apellido_chof, direccion_chof, dni_chof, cel_chof FROM choferes WHERE 1";
    $resultchof = $con->query($sqlchoferes);
    $chof = $resultchof->fetch_assoc();

    $sqlunidad = "SELECT * FROM unidades WHERE 1";
    $resultuni = $con->query($sqlunidad);
    $uni = $resultuni->fetch_assoc();

    $sqlmovil = "SELECT * FROM no_movil WHERE 1";
    $resultmovil = $con->query($sqlmovil);
    $mov = $resultmovil->fetch_assoc();

    $sqlAbono = "SELECT * FROM abonos WHERE 1";
    $resultAbono = $con->query($sqlAbono);
    $abono = $resultAbono->fetch_assoc();

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">CREAR UNIDAD COMPLETA NUEVA</h3>
            </div>
            <form class="form-group" accept=-"charset utf8" action="confirma_unidad.php" method="post">



                <div class="from-group">
                    <label class="control-label">NUMERO DE MOVIL</label>
                    <select name="no_movil" id="no_movil" class="form-control" required>
                        <option value="<?php //echo $mov['id']; 
                                        ?>"> <?php //echo $mov['movil'] 
                                                    ?></option>
                        <?php
                        $sqlmovil = "SELECT * FROM no_movil";
                        $resultMov = $con->query($sqlmovil);
                        while ($rowMov = $resultMov->fetch_assoc()) {
                            if ($rowm['id'] != $rowMov['movil']) {
                        ?>
                                <option value="<?php echo $rowMov['id']; ?>"> <?php echo $rowMov['movil'] ?>
                                </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>


                <div class="col-md-12">
                    <div class="from-group">
                        <label class="control-label">TITULAR</label>
                        <select name="apellido_titu" id="apellido_titu" class="form-control" required>
                            <option value="<?php //echo $titu['id']; 
                                            ?>"> <?php //echo $titu['apellido_titu'] 
                                                    ?></option>
                            <?php
                            $sqltitu = "SELECT * FROM titulares";
                            $result = $con->query($sqltitu);
                            while ($rowTitu = $result->fetch_assoc()) {
                                if ($rowt['id'] != $rowTitu['apellido_titu']) {
                            ?>
                                    <option value="<?php echo $rowTitu['id']; ?>"> <?php echo $rowTitu['apellido_titu'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="from-group">
                        <label class="control-label">CHOFERES</label>
                        <select name="apellido_chof" id="apellido_chof" class="form-control" required>
                            <option value="<?php //echo $chof['id']; 
                                            ?>"> <?php //echo $chof['apellido_chof'] 
                                                    ?></option>
                            <?php
                            $sqlchof = "SELECT * FROM choferes";
                            $resultchof = $con->query($sqlchof);
                            while ($rowChof = $resultchof->fetch_assoc()) {
                                if ($rowc['id'] != $rowChof['apellido_chof']) {
                            ?>
                                    <option value="<?php echo $rowChof['id']; ?>"> <?php echo $rowChof['apellido_chof'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="from-group">
                        <label class="control-label">UNIDADES</label>
                        <select name="unidad" id="unidad" class="form-control" required>
                            <option value="<?php //echo $uni['id']; 
                                            ?>"> <?php //echo $uni['dominio'] 
                                                    ?></option>
                            <?php
                            $sqlunidad = "SELECT * FROM unidades";
                            $resuluni = $con->query($sqlunidad);
                            while ($rowUni = $resuluni->fetch_assoc()) {
                                if ($rowu['id'] != $rowUni['dominio']) {
                            ?>
                                    <option value="<?php echo $rowUni['id']; ?>"> <?php echo $rowUni['dominio'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>





                    <div class="from-group">
                        <label class="control-label">ABONO SEMANAL</label>
                        <select name="abono" id="abono" class="form-control" required>
                            <option value="<?php //echo $abono['id']; 
                                            ?>"> <?php //echo $abono['abono'] 
                                                    ?></option>
                            <?php
                            $sqlAbono = "SELECT * FROM abonos";
                            $resultAbono = $con->query($sqlAbono);
                            while ($rowAbono = $resultAbono->fetch_assoc()) {
                                if ($rowA['id'] != $rowAbono['abono']) {
                            ?>
                                    <option value="<?php echo $rowAbono['id']; ?>"> <?php echo $rowAbono['abono'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="text-center">
                        <br>
                        <a href="../../index.php" class="text-center btn btn-primary">SALIR</a>
                        <input type="submit" class="btn btn-danger" value="guardar Unidad">
                    </div>


                </div>
            </form>
        </div>
    </div>
</body>

</html>