<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    echo "<br>";

    $fecha_Actual = mktime(); //La fecha actual en formato timestamp


    $dividefecha = explode("-", $cuenta_semanas);

    $fecha_previa = mktime(0, 0, $dividefecha[2], $dividefecha[1], $dividefecha[0]);

    $segundos = $fecha_previa - $fecha_Actual; // Obtenemos los segundos entre esas dos fechas
    
    $segundos = abs($segundos); //en caso de errores

    $semanas = floor($segundos / 604800); //Obtenemos las semanas entre esas fechas.

    //echo "hay " . $semanas . " Semanas";

    // ***************************************************************************
    // ********************************************
    ?>

</body>

</html>