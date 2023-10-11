<?php

//session_start();

//if ($_SESSION['logueado']) {

include_once '../../includes/db.php';
/* en ese archivo estan las funciones */
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");

$movil = $_POST['no_movil'];
$titular = $_POST['apellido_titu'];
$chofer = $_POST['apellido_chof'];
$unidad = $_POST['unidad'];
$abono = $_POST['abono'];


$sql_movil = "SELECT * FROM no_movil WHERE id =" . $movil;
$result_movil = $con->query($sql_movil);
$row_mov = $result_movil->fetch_assoc();

$sql_titu = "SELECT * FROM titulares WHERE id =" . $titular;
$result_titu = $con->query($sql_titu);
$row_titu = $result_titu->fetch_assoc();

$sql_chof = "SELECT * FROM choferes WHERE id =" . $chofer;
$result_chof = $con->query($sql_chof);
$row_chof = $result_chof->fetch_assoc();

$sql_uni = "SELECT * FROM unidades WHERE id =" . $unidad;
$result_uni = $con->query($sql_uni);
$row_uni = $result_uni->fetch_assoc();


$sql_abono = "SELECT * FROM abonos WHERE id=" . $abono;
$result_abono = $con->query($sql_abono);
$row = $result_abono->fetch_assoc();
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACONFIRMAR UNIDAD</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/form.css">

</head>

<body>

    <div class="container">
        <h3 class="text-center">CONFIRMAR UNIDAD COMPLETA</h3>
        <div class="row">

            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="save_uni_completa.php" method="post">



                    <div class="form-group">
                        <label class="control-label">NUMERO DE MOVIL</label>
                        <input type="text" class="form-control" id="movil" name="movil" value="<?php echo $row_mov['id'] . " " . " " . " " . $row_mov['movil'] ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">APELLIDO TITULAR</label>
                        <input type="text" class="form-control" id="titular" name="titular" value="<?php echo  $row_titu['id'] . " " . " " . " " . $row_titu['nombre_titu'] . " " . $row_titu['apellido_titu']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">APELLIDO CHOFER</label>
                        <input type="text" class="form-control" id="chofer" name="chofer" value="<?php echo $row_chof['id'] . " " . " " . " " . $row_chof['nombre_chof'] . " " . $row_chof['apellido_chof']; ?>">
                    </div>


                    <div class="form-group">
                        <label class="control-label">UNIDAD</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $row_uni['id'] . " " . " " . " " . $row_uni['modelo']  . " " . $row_uni['dominio']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">ABONO</label>
                        <input type="text" class="form-control" id="abono" name="abono" value="<?php echo  $row['id']  . " " . " " . " " . $row['abono']; ?>">
                    </div>



                    <div class="text-center">
                        <br>
                        <a href="armar_unidad.php" class="btn btn-primary">CANCELAR</a>
                        <input type="submit" class="btn btn-danger" value="GUARDAR UNIDAD">

                    </div>

                </form>


            </div>

        </div>
    </div>
    </div>

</html>