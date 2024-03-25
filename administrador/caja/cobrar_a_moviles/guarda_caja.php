<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Guarda</h1>
    <?php
    echo $movil = $_POST['movil'];



    include_once '../../../includes/db.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $sql = "INSERT INTO caja_voucher(movil, fecha, semana, tot_voucher, tot_movil, para_base, efvo) 
    VALUES (?,?,?,?,?,?,?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("iiiiiii", $movil, $hoy, $semana, $suma, $tot_mov, $tot_base, $ft);


    if ($stmt->execute()) {

    ?>

        <script>
            /*         alert("Nueva Unidad Ingresada")
            window.location = "deudor.php";*/
        </script>
    <?php

    }

    ?>

</body>

</html>