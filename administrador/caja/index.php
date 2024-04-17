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
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
    </head>

    <body>
        <?php
        include "../voucher/pertiga.php";

        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li><a href="cobrar_a_moviles/inicio.php" class="btn btn-primary">COBRR A MOVILES</a></li>
                        <br>
                        <li><a href="genera_deuda/genera_deuda.php" class="btn btn-primary">GENERAR DEUDA ANTERIOR</a></li>
                        <br>
                        <li><a href="semana/semana.php" class="btn btn-primary">SEMANA</a></li>
                        <br>
                        <li><a href="resumen_de_caja/index.php" class="btn btn-primary">RESUMEN DE CAJA</a></li>
                        <br>
                        <li><a href="venta/venta_prod.php" class="btn btn-primary">VENTA DE PRODUCTOS</a></li>
                        <br>
                        <li><a href="#">INGRESAR FT</a></li>
                        <br>
                        <li><a href="#">EXTRAER FT</a></li>
                        <br>
                        <li><a href="../../administrador/caja/index.php" class="btn btn-primary">SALIR</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>