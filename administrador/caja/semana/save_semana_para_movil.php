<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>aca</p>
    <?php
    $movil = $_POST['movil'];
    echo $movil;

    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    if ($con->connect_error) {
        die("Error de conexión a la primera base de datos: " . $con->connect_error);
    }

    $sql_sem = "SELECT * FROM semanas WHERE movil ='$movil'";
    $listar = $con->query($sql_sem);


    if ($listar->num_rows > 0) {
        echo "Ese movil ya existe...";

    ?>
        <br>
        <a href="nueva_semana_movil.php">VOLVER</a>
    <?php
    }


    ?>
</body>

</html>