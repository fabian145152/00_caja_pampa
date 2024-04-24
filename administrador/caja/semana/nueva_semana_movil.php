<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Crear nuava semama para el movil</h2>
    <?php
    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    if ($con->connect_error) {
        die("Error de conexión a la primera base de datos: " . $con->connect_error);
    }

    ?>
    <form action="save_semana_para_movil.php" method="POST">
        <input type="text" id="movil" name="movil">
        <button type="submit">CREAR</button>
    </form>
    <br>
    <a href="inicio_semana.php">VOLVER</a>

</body>

</html>