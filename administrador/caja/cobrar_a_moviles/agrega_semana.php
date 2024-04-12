<?php
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h1>Semana</h1>
        <?php

        // Establecer la zona horaria para evitar problemas con la fecha
        date_default_timezone_set('America/Mexico_City');

        // Obtener el número de la semana actual
        $semana_actual = date('W');

        // Guardar el número de la semana en un archivo o base de datos para futuras comparaciones
        // Por ejemplo, podrías guardarlo en un archivo de texto
        $archivo_semana = 'semana.txt';
        if (file_exists($archivo_semana)) {
            // Si el archivo existe, leer el número de la semana anterior
            $semana_anterior = file_get_contents($archivo_semana);
            // Comparar con la semana actual
            if ($semana_actual != $semana_anterior) {
                // Si hay un cambio de semana, guarda el número de la semana actual en el archivo
                file_put_contents($archivo_semana, $semana_actual);
                // Guardar el número de la semana actual en una variable
                $cambio_de_semana = $semana_actual;
            } else {
                // Si no hay cambio de semana, deja la variable vacía
                $cambio_de_semana = '';
            }
        } else {
            // Si el archivo no existe (por ejemplo, es la primera vez que se ejecuta el script), guarda el número de la semana actual en el archivo
            file_put_contents($archivo_semana, $semana_actual);
            // Guardar el número de la semana actual en una variable
            $cambio_de_semana = $semana_actual;
        }

        // Imprimir el resultado (puedes hacer lo que desees con esta variable)
        echo "Cambio de semana detectado: $cambio_de_semana";

        ?>
    </body>

    </html>

<?php
}
