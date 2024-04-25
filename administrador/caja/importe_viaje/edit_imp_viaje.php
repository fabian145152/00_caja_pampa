<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITA IMPORTE VIAJES</title>


    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>

</head>

<body>
    <br><br>
    <?php
    $nombre = $_GET['q'];


    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $sql_viajes = "SELECT * FROM importe_viajes WHERE 1";


    $result = $con->query($sql_viajes);
    $row = $result->fetch_assoc();


    ?>

    <div class="container">
        <h3 class="text-center">ACTUALIZAR IMPORTES x VIAJE</h3>
        <div class="row">

            <div class="col-md-12">

                <form class="form-group" accept=-"charset utf8" action="update_imp_viaje.php" method="POST">
                    <div class="from-group">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">NOMBRE</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" readonly value="<?php echo $row['nombre']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">IMPORTE</label>
                        <input type="text" class="form-control" id="importe" name="importe" autofocus value="<?php echo $row['importe'] ?> ">
                    </div>

                    <div class="text-center">
                        <br>
                        <input type="submit" class="btn btn-primary" value="GUARDAR MOVIL">
                        <br>
                        <br><br>
                        <a href="viaje.php" class="btn btn-primary">VOLVER</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>