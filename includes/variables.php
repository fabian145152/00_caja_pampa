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
    $abono_viaje_1 = 94;
    $abono_viaje_2 = 260;
   
    $adicional_de_radio = 396;

    $abono_porteño_pampa = 4100;
    $abono_basico = 3200;
    $abono_pasea_carteles = 2200;
    $abono_tropas = 3000;
    $abono_super_especial = 900;
    $abono = 0;
    $abono_taller = 1950;
    $abono_con_bonificacion = 1875;
    $abono_taller_especial = 1250;
    $abono_tropa_especial = 3600;
    $abono_no_te_vayas = 650;
    $abono_especial = 2250;
    $abono_taller_pampa = 1600;
    $acuerdo_sin_aumento = 780;
    $abono_bonificacion_pampa = 1400;
    $abono_tropa_diaz = 1125;
    $abono_bonificado = 1800;
    $abono_porte = 2600;



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
        echo $GLOBALS["abono_porteño_pampa"];
        echo $GLOBALS["abono_basico"];
        echo $GLOBALS["abono_pasea_carteles"];
        echo $GLOBALS["abono_tropas"];
        echo $GLOBALS["abono_super_especial"];
        echo $GLOBALS["abono"];
        echo $GLOBALS["abono_taller"];
        echo $GLOBALS["abono_con_bonificacion"];
        echo $GLOBALS["abono_taller_especial"];
        echo $GLOBALS["abono_tropa_especial"];
        echo $GLOBALS["abono_no_te_vayas"];
        echo $GLOBALS["abono_especial"];
        echo $GLOBALS["abono_taller_pampa"];
        echo $GLOBALS["acuerdo_sin_aumento"];
        echo $GLOBALS["abono_bonificacion_pampa"];
        echo $GLOBALS["abono_torpa_diaz"];
        echo $GLOBALS["abono_bonificado"];
        echo $GLOBALS["abono_porte"];
    }

    ?>

</body>

</html>