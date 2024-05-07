<?php session_start();

include_once '../../../includes/db.php';
include_once '../../../includes/variables.php';
$con = openCon('../../../config/db_admin.ini');
$con->set_charset("utf8mb4");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPORTES A COBRAR</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <input type="text" id="movil" name="movil">
        </div>
    </form>
    <?php

    $sql_complleta = "SELECT * FROM completa WHERE movil = '$movil'";
    $row_comp = $con->query($sql_completa);

    while ($row_comp = $result->fetch_assoc()) {
        echo $row_comp['movil'];
    }

    ?>


    <div class="container">
        <h3 class="text-center">IMPORTES A COBRAR</h3>
        <div class="row">

            <div class="col-md-12">

                <form class="form-group" accept=-"charset utf8" action="#" method="POST">
                    <div class="from-group">
                        <input type="hidden" name="id" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">NOMBRE</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
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

</body>

</html>