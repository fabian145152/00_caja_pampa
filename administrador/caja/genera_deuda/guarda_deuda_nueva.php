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
    $deuda_anterior = $_POST['deuda_anterior'];

    echo $movil;
    echo "<br>";
    echo $deuda_anterior;



    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    if ($con->connect_error) {
        die("Error de conexión a la primera base de datos: " . $con->connect_error);
    }



    $sql = "UPDATE completa SET deuda_anterior = $deuda_anterior WHERE movil = $movil";
    $result = $con->query($sql);

    header("Location:../index.php");

    ?>
</body>

</html>