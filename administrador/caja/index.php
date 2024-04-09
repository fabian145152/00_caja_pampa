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
        <title>MENU DE CAJA</title>
    </head>

    <body>
        <div>
            <ul>
                <li><a href="cobrar_a_moviles/inicio.php">COBRR A MOVILES</a></li>
                <br>
                <li><a href="#">INGRESAR FT</a></li>
                <br>
                <li><a href="#">ESTRAER ft</a></li>
                <br>
                <li><a href="resumen_de_caja/index.php">RESUMEN DE CAJA</a></li>
                <br>
                <li><a href="../../menu.php">SALIR</a></li>
            </ul>
        </div>
    </body>

    </html>

<?php
}
?>