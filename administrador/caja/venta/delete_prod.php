|<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Delete</h1>
    <br>
    <?php


    $id = $_GET['q'];
    echo $id;

    include_once '../../../includes/db.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $id = $_GET['q'];

    $sql = "DELETE FROM productos WHERE id=" . $id;
    $result = $con->query($sql);



    header("Location:venta_prod.php");


    ?>
</body>

</html>