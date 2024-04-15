<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php

    $movil = $_POST['movil'];

    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    if ($con->connect_error) {
        die("Error de conexión a la primera base de datos: " . $con->connect_error);
    }

    $sql = "SELECT * FROM completa WHERE movil = '$movil'";
    $result = $con->query($sql);
    ?>

    <br>
    <?php
    if ($result->num_rows > 0) {
        // Imprimir los datos del último registro
        $row = $result->fetch_assoc();
    ?>
        <h3>La deuda anterior del movil <?php echo $row['movil'] ?> en de $ <?php echo $row['deuda_anterior'] ?>...</h3>
        <ul>

            <li><?php echo $row['id'] ?></li>
            <li><?php echo $row['movil'] ?></li>
            <li><?php echo $row['nombre_titu']; ?></li>
            <li><?php echo $row['apellido_titu'] ?></li>
            <li><?php echo $row['deuda_anterior'] ?></li>
        </ul>


    <?php

    } else {
        echo "No se encontraron registros.";
    }
    ?>

    <form class="form" action="guarda_deuda_nueva.php?=q'$movil'" method="POST" name="movil">
        <h1>Ingrese nuevo Monto</h1>
        <br><br>

        <input type="hidden" name="movil" class="gui-input" value="<?php echo $movil ?>">
        <br><br>
        <input type="text" name="deuda_anterior" class="gui-input" autofocus>
        <br><br>
        <input type="submit" value="GUARDAR" class=" btn btn-primary">
    </form>

    <a href="../index.php">SALIR</a>


</body>

</html>