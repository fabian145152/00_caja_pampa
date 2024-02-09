<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Deudor</h1>
    <?php

    echo "Movil: " . $movil = $_POST['movil'];
    echo "<br>";
    echo "Suma reloj + Adicional: " . $Reloj_adicional = $_POST['suma_reloj'];
    echo "<br>";
    echo "10% para base: " . $diez_para_base =  $_POST['para_base'];
    echo "<br>";
    echo "Semanas adeudadas: " . $semanas_desde_inicio = $_POST['semanas'];
    echo "<br>";
    echo "Abono semanal: " . $abono_semanal = $_POST['abono'];
    echo "<br>";
    echo "Paga x Viaje: " . $x_viaje = $_POST['x_viaje'];
    echo "<br>";
    echo "Total de viajes: " . $cant_viajes = $_POST['cant_viaje'];
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Debe de semanas: " . $debe_de_semanas = $semanas_desde_inicio * $abono_semanal;
    echo "<br>";
    echo "Debe de viajes: " . $debe_de_viajes = $x_viaje * $cant_viajes;
    echo "<br>";
    echo "<br>";
    echo "<br>";



    ?>
</body>

</html>