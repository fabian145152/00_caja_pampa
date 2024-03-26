<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <style>
        #contenedor {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        #contenedor>div {
            width: 50;
        }
    </style>
</head>

<body>
    <?php
    include_once '../../includes/db.php';
    echo $id = $_GET['id'];
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $sql = "SELECT * FROM voucher_nuevos WHERE id = '$id' ";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    echo "<br>";
    echo $viaje = $row['viaje_no'];
    echo "<br>";
    echo $movil = $row['movil'];
    ?>
    <form action="valida_voucher.php" method="post">
        Ingrese su nombre:
        <input type="text" name="id" value="<?php echo $row['id'] ?>" size="20">
        <br>
        <button type="submit">VALIDAR</button>
    </form>


    ?>
</body>

</html>