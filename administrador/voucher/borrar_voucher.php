<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!--
Esta pagina Borral la DDBB donde se importamn los voucher

-->


<body>
    <h1>HOLA</h1>
    <?php
    include "database.php";
    //include("../includes/conexion.php");
    $con->query("TRUNCATE TABLE voucher_nuevos");

    //$con->query("TRUNCATE TABLE cuenta_101");

    header("location:inicio_voucher.php");



    ?>
</body>

</html>