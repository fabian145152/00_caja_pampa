<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACTUALIZAR TITULAR</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>

</head>

<?php

include_once '../../includes/db.php';
/* en ese archivo estan las funciones */
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
$id_upd = $_GET['q'];
echo $id_upd;

$sql = "SELECT id, 
               nombre_titu, 
               apellido_titu, 
               direccion_titu, 
               dni_titu, 
               licencia_titu, 
               fecha_inicio,
               fecha_facturacion,
               /*date_format (fecha_inicio, '%d-%m-%Y') as f_inicio, 
               date_format (fecha_facturacion, '%d-%m-%Y') as f_fact, */
               cel_titu FROM completa WHERE id=" . $id_upd;
$result = $con->query($sql);
$row = $result->fetch_assoc();
//}
?>


<body>

    <div class="container">
        <h3 class="text-center">ACTUALIZAR DATOS DEL TITULAR</h3>


        <div class="row">

            <div class="col-md-12">

                <form class="form-group" accept=-"charset utf8" action="update_titulares.php" method="post">

                    <div class="from-group">

                        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                    </div>


                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo  $row['nombre_titu']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['apellido_titu']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['direccion_titu']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $row['dni_titu']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">LICNECIA</label>
                        <input type="text" class="form-control" id="licencia" name="licencia" value="<?php echo $row['licencia_titu']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Celular</label>
                        <input type="text" class="form-control" id="cel" name="cel" value="<?php echo $row['cel_titu']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">FECHA DE INSCRIPCION</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">FECHA FACTURACION</label>
                        <input type="date" class="form-control" id="fecha_fact" name="fecha_fact" value="<?php echo $row['fecha_facturacion']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SELECCIONAR ABONO SEMANAL</label>
                        <select name="abono" id="abono" class="form-control" require>
                            <?php
                            include_once '../../includes/db.php';
                            $con = openCon('../../config/db_admin.ini');
                            $con->set_charset("utf8mb4");
                            $sql = "SELECT * FROM abonos WHERE 1";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['abono'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SELECCIONAR ABONO X VIAJE</label>
                        <select name="abono_viaje" id="abono_viaje" class="form-control" require>
                            <?php
                            include_once '../../includes/db.php';
                            $con = openCon('../../config/db_admin.ini');
                            $con->set_charset("utf8mb4");
                            $sql = "SELECT * FROM abonos WHERE 1 ORDER BY abono";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['abono'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="text-center">
                        <br>
                        <input type="submit" class="btn btn-success" value="GUARDAR DATOS">
                    </div>


            </div>

        </div>
    </div>
    </div>

</html>