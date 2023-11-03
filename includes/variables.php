<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICA IMPORTES</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
</head>

<body>

    <?php



    $abono_porteño = 2500;
    $abono_pampa = 2000;
    $abono_pasea_carteles = 1000;
    $abono_viaje_1 = 75;
    $abono_viaje_2 = 95;
    $abono_viaje_3 = 100;
    $adicional_de_radio = 230;


    function globales()
    {
        //estoy dentro de la función, para aceder a las variables utilizo $GLOBALS 
        echo $GLOBALS["abono_porteño"];
        echo $GLOBALS["abono_pampa"];
        echo $GLOBALS["abono_pasea_carteles"];
        echo $GLOBALS["abono_viaje_1"];
        echo $GLOBALS["abono_viaje_2"];
        echo $GLOBALS["abono_viaje_3"];
        echo $GLOBALS["adicional_de_radio"];
    }

    ?>

</body>

</html>