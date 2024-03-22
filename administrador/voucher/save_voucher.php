<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>EDITAR</h1>
    <?php
    echo $id = $_POST['id'];
    echo "<br>";
    echo $movil = $_POST['movil'];
    echo "<br>";
    echo $reloj = $_POST['reloj'];
    echo "<br>";
    echo $peaje = $_POST['peaje'];
    echo "<br>";
    echo $equipaje = $_POST['equipaje'];
    echo "<br>";
    echo $adicional = $_POST['adicional'];
    echo "<br>";
    echo $plus = $_POST['plus'];
    echo "<br>";


    echo $total = $reloj + $peaje + $equipaje + $adicional + $plus;

    include_once '../../includes/db.php';


    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $sql = "UPDATE voucher_nuevos SET reloj= ?, 
                                    peaje= ?, 
                                    equipaje= ?, 
                                    adicional= ?, 
                                    plus= ?, 
                                    total = ? 
                        WHERE id=$id";



    $stmt = $con->prepare($sql);
    $stmt->bind_param("dddddd", $reloj, $peaje, $equipaje, $adicional, $plus, $total);



    if ($stmt->execute()) {
    ?>

        <script>
            window.location = "inicio_voucher.php";
        </script>
    <?php

    }



    ?>
</body>