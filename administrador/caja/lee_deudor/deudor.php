<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Deudor</h1>

    <h3>empezar a crear la tabla para guardar los registros de los pagos</h3>

    <?php

    echo "Fecha de hoy: " . $hoy = date("Y-m-d");

    echo "<br>";
    echo "Movil: " . $movil = $_POST['movil'];
    echo "<br>";
    echo "Suma totales: " . $suma = $_POST['suma_reloj'];
    echo "<br>";
    echo "Abono semanal: " . $abono = $_POST['abono'];
    echo "<br>";
    echo "Abona por viaje: " . $x_viaje = $_POST['x_viaje'];
    echo "<br>";
    echo "Cantidad de viajes: " . $cant_viajes = $_POST['cant_viaje'];
    echo "<br>";

    echo "Deposito en efectivo: " . $ft = $_POST['ft'];
    echo "<br>";
    echo "Fecha ultiomo deposito: " . $fecha = $_POST['fecha_pago'];

    echo "<br>";
    echo "<br>";
    $datetime1 = new DateTime($fecha);

    $datetime2 = new DateTime($hoy);
    echo "<br>";

    $interval = $datetime1->diff($datetime2);

    $diferencia = floor(($interval->format('%a') / 7));

    echo "Semanas acumuladas: " . $diferencia;
    echo "<br>";
    echo "debe de semanas: " . $deuda_semana = $abono * $diferencia;
    echo "<br>";
    echo "debe de viajes: " . $deuda_viajes = $cant_viajes * $x_viaje;
    echo "<br>";


    ?>
</body>

</html>