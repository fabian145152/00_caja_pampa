<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Valida y guarda Voucher</h1>
    <?php
    echo $id = $_GET['q'];

    include_once '../../includes/db.php';



    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");
    $sql = "SELECT id, movil, completado, viaje_no, cc, reloj, peaje, equipaje, adicional,plus FROM voucher_nuevos WHERE id = $id ";

    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    ?>

    <ul>
        <li><?php echo $movil = $row['movil'] ?></li>
        <li><?php echo $viaje_no = $row['viaje_no'] ?></li>
        <li><?php echo $completado = $row['completado'] ?></li>
        <li><?php echo $cc = $row['cc'] ?></li>
        <li><?php echo $reloj = $row['reloj'] ?></li>
        <li><?php echo $peaje = $row['peaje'] ?></li>
        <li><?php echo $equipaje = $row['equipaje'] ?></li>
        <li><?php echo $adicional = $row['adicional'] ?></li>
        <li><?php echo $plus = $row['plus'] ?></li>
    </ul>

    <?php
    echo $id;
    echo "<br>";
    echo $movil;
    echo "<br>";
    //echo $completado;
    echo "<br>";
    $a_completado = str_replace("/", "-", $completado);
    echo "<br>";
    echo $a_completado;
    echo "<br>";
    echo "<br>";

    $valores = explode("-", $a_completado);
    echo $valores[0];
    echo "<br>";
    echo $valores[1];
    echo "<br>";
    echo $valores[2];
    echo "<br>";
    echo $fecha_armada = $valores[2] . "-" . $valores[1] . "-" . $valores[0];


    echo $viaje_no;
    echo "<br>";
    echo $cc;
    echo "<br>";
    echo $reloj;
    echo "<br>";
    echo $peaje;
    echo "<br>";
    echo $equipaje;
    echo "<br>";
    echo $adicional;
    echo "<br>";
    echo $plus;
    echo "<br>";
    $valida = "INSERT INTO voucher_validado VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $con->prepare($valida);
    $stmt->bind_param("issiiiiiii", $id, $movil, $fecha_armada, $viaje_no, $cc, $reloj, $peaje, $equipaje, $adicional, $plus);


    if ($stmt->execute()) {

    ?>

        <script>
            <?php
            $borra_vou_validado = "DELETE FROM voucher_nuevos WHERE id=" . $id;
            $borrado = $con->query($borra_vou_validado);
            ?>

             window.location = "inicio_voucher.php";
        </script>
    <?php

    } else {
    ?>
        <script>
            alert("VOUCHER DUPLICADO")
            window.location = "inicio_voucher.php";
        </script>
    <?php
    }



    ?>




</body>

</html>